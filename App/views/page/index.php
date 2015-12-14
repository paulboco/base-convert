<?php self::inject('layout/header') ?>

<h1>Base Converter</h1>

<div id="app">
    <fieldset>
        <legend>Input</legend>
        <div>
            <label for="inputNumber">Number:</label>
            <input type="text" name="inputNumber" v-model="inputNumber" @keyup="convert" autofocus>
        </div>
        <div>
            <label for="inputBase">Base:</label>
            <select v-model="inputBase" @change="convert">
                <?php foreach (range(2, 36) as $base): ?>
                    <option value="<?php echo $base ?>"><?php echo $base ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </fieldset>
    <fieldset>
        <legend>Output</legend>
        <div>
            <label for="outputBase">Base:</label>
            <select v-model="outputBase" @change="convert">
                <?php foreach (range(2, 36) as $base): ?>
                    <option value="<?php echo $base ?>"><?php echo $base ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </fieldset>
    <fieldset>
        <legend>Result</legend>
        <h2 v-cloak v-show="result != 0">{{ result }}</h2>
    </fieldset>

    <pre class="debug" v-cloak>{{ $data|json }}</pre>
</div>

<script>
    var data = {
        inputNumber: '',
        inputBase: 10,
        outputBase: 16,
        result: '',
    };
    new Vue({
        el: '#app',
        data: data,
        ready: function () {
            this.result = this.convert();
        },
        methods: {
            convert: function() {
                var url = 'page/convert?input-number=' + this.inputNumber + '&input-base=' + this.inputBase + '&output-base=' + this.outputBase;
                this.$http.get(url).success(function(result) {
                    this.$set('result', result);
                }).error(function(error) {
                    console.log(error);
                });
            }
        },
    });
</script>

<?php self::inject('layout/footer') ?>
