<?php self::inject('layout/header') ?>

<div id="app" v-cloak>
    <base-select :base="inputBase" @change="convert"></base-select>

    <pre class="debug">{{ $data|json }}</pre>
</div>

<template id="base-select">
    <label class="header">Base:</label>
    <label v-for="baseRadioOption in baseRadioOptions">
        <input type="radio"
            value="{{ baseRadioOption.value }}"
            @change="convert"
            v-model=base
         >
        {{ baseRadioOption.key }}
    </label>
</template>

<script>

new Vue({
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
                    base: 10
                }
            }
        }
    },
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
            console.log(this.inputBase);
            return;

            // var url = 'page/convert?input-number='
            //     + this.inputNumber + '&input-base='
            //     + this.inputBase + '&output-base='
            //     + this.outputBase;
            // this.$http.get(url).success(function(result) {
            //     this.$set('result', result);
            // }).error(function(error) {
            //     console.log(error);
            // });
        }
    },
});

</script>

<?php self::inject('layout/footer') ?>

<!--
    <label class="dropdown">By integer:
        <select v-model="inputBase" @change="convert">
            <?php foreach (range(2, 36) as $base): ?>
                <option value="<?php echo $base ?>"><?php echo $base ?></option>
            <?php endforeach; ?>
        </select>
    </label> -->
