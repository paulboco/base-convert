new Vue({
    el: '#app',
    data: {
        inputNumber: '',
        inputLengthMax: 18,
        inputLengthMaxed: false,
        inputBase: 10,
        outputBase: 10,
        result: ''
    },
    filters: {
        // Separate decimal thousands with commas.
        decimal: function(number) {
            if (this.outputBase == 10) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            }
            return number;
        }
    },
    components: {
        'base-selector': {
            template: '#base-selector-template',
            props: ['base', 'name', 'label'],
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
    methods: {
        cleanseInputNumber: function() {
            this.inputNumber = this.inputNumber
                .replace(/[^A-Za-z0-9]/g, '')
                .substring(0, this.inputLengthMax);
            this.markInputNumberLengthMaxed();
        },
        markInputNumberLengthMaxed: function() {
            this.inputLengthMaxed = this.inputNumber.length == this.inputLengthMax;
        },
        convert: function() {
            url = this.getUrl();
            this.$http.get(url).success(function(result) {
                this.$set('result', result);
            }).error(function(error) {
                console.log(error);
            });
        },
        getUrl: function() {
            uri = [this.inputNumber, this.inputBase, this.outputBase].join('/');
            return '/api/base_convert/' + uri;
        }
    },
});
