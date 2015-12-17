<?php self::inject('layout/header') ?>

<div id="app" v-cloak>

    <input type="text"
        v-model="inputNumber"
        placeholder="Enter a number"
        autofocus
    >
    <br>
    <base-select :base.sync="inputBase"></base-select>
    <br>
    <base-select :base.sync="outputBase"></base-select>

    <h1>{{result}}</h1>
    <pre class="debug">{{ $data|json }}</pre>
</div>

<template id="base-select">
    <label class="header">Base:</label>
    <label v-for="baseRadioOption in baseRadioOptions">
        <input type="radio"
            value="{{ baseRadioOption.value }}"
            v-model=base
         >
        {{ baseRadioOption.key }}
    </label>
    <label class="dropdown">By integer:
        <select v-model="base">
            <option v-for="baseSelectOption in baseSelectOptions" :value="baseSelectOption">{{ baseSelectOption }}</option>
        </select>
    </label>
    <label class="dropdown">By integer:
        <select v-model="base">
            <?php foreach (range(2, 36) as $base): ?>
                <option value="<?php echo $base ?>"><?php echo $base ?></option>
            <?php endforeach; ?>
        </select>
    </label>
</template>

<script>

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

</script>

<?php self::inject('layout/footer') ?>

<!--
    <label class="dropdown">By integer:
        <select v-model="inputBase" @change="convert">
            <?php foreach (range(2, 36) as $base): ?>
                <option value="<?php echo $base ?>"><?php echo $base ?></option>
            <?php endforeach; ?>
        </select>
    </label>
for(var i=0; i<4; i++)  {
    data.push({label: lab[i], value: val[i]});
}
 -->
