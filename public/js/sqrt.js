new Vue({
    el: '#app',
    data: {
        inputNumber: '',
        inputLengthMax: 18,
        inputLengthMaxed: false,
        result: ''
    },
    watch: {
        'inputNumber': function() {
            this.findSqrt();
        }
    },
    methods: {
        cleanseInputNumber: function() {
            this.inputNumber = this.inputNumber
                .replace(/[^0-9]/g, '')
                .substring(0, this.inputLengthMax);
            this.markInputNumberLengthMaxed();
        },
        markInputNumberLengthMaxed: function() {
            this.inputLengthMaxed = this.inputNumber.length == this.inputLengthMax;
        },
        findSqrt: function() {
            url = this.getUrl();
            this.$http.get(url).success(function(result) {
                this.$set('result', result);
            }).error(function(error) {
                console.log(error);
            });
        },
        getUrl: function() {
            return '/api/sqrt/' + this.inputNumber;
        }
    },
});
