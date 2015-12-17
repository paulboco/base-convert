new Vue({
    el: '#app',
    data: {
        inputNumber: '',
        inputBase: 10,
        outputBase: 16,
        result: ''
    },
    components: {
        'base-select': {
            template: '#base-select',
            props: ['base'],
            data: function() {
                return {
                    baseRadioOptions: [
                        {key: 'Binary', value: 2},
                        {key: 'Octal', value: 8},
                        {key: 'Decimal', value: 10},
                        {key: 'Hexidecimal', value: 16},
                    ],
                    baseSelectOptions: [3,4,5,6,7,9,11,12,13,14,15,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32]
                }
            }
        }
    },
    watch: {
        'inputNumber': function() {
            this.convert();
        },
        'inputBase': function() {
            this.convert();
        },
        'outputBase': function() {
            this.convert();
        }
    },
    ready: function () {
        this.result = this.convert();
    },
    methods: {
        convert: function() {
            var url = '/page/convert?input-number='
                + this.inputNumber + '&input-base='
                + this.inputBase + '&output-base='
                + this.outputBase;
            this.$http.get(url).success(function(result) {
                this.$set('result', result);
            }).error(function(error) {
                console.log(error);
            });
        }
    },
});
