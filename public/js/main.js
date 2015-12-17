Vue.component('base-select', {
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
            base: 10
        }
    }
});

new Vue({
    el: '#app',
    data: {
        inputNumber: '',
        inputBase: 10,
        outputBase: 16,
        result: ''
    },
    ready: function () {
        this.result = this.convert();
    },
    methods: {
        convert: function() {
            var url = 'page/convert?input-number='
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
