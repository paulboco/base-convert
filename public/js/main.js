new Vue({
    el: '#app',
    data: {
        inputNumber: '',
        inputBase: 10,
        outputBase: 16,
        result: '',
        baseOptions: [
            {key: 'Binary', value: 2},
            {key: 'Octal', value: 8},
            {key: 'Decimal', value: 10},
            {key: 'Hexidecimal', value: 16},
        ],
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
