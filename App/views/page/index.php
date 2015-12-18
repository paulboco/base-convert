<?php self::inject('layout/header') ?>

<h1>Base Converter</h1>

<div id="app" v-cloak>
    <fieldset>
        <legend>Input</legend>
        <div>
            <label class="header" for="inputNumber">Number:</label>
            <input type="text"
                v-model="inputNumber"
                placeholder="Enter a number"
                autofocus
            >
        </div>
        <div>
            <base-selector :base.sync="inputBase"></base-selector>
        </div>
    </fieldset>
    <fieldset>
        <legend>Output</legend>
        <div>
            <base-selector :base.sync="outputBase"></base-selector>
        </div>
    </fieldset>
    <fieldset>
        <legend>Result</legend>
        <h2 v-show="result != 0">{{ result }}</h2>
    </fieldset>

    <pre class="debug">{{ $data|json }}</pre>
</div>

<template id="base-selector-template">
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
</template>

<script src="/js/vue.js"></script>
<script src="/js/vue-resource.js"></script>
<script src="/js/main.js"></script>

<?php self::inject('layout/footer') ?>
