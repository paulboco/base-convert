<?php self::inject('layout/header') ?>

<h1>Base Converter</h1>

<div id="app" v-cloak>
    <fieldset>
        <legend>Convert</legend>
        <div>
            <input type="text"
                @keyup="cleanseInputNumber;markInputLengthMaxed"
                v-model="inputNumber"
                placeholder="Enter a number (alphanumeric only)"
                autofocus
            >
            <span class="warning" v-show="inputLengthMaxed">Only 16 digits allowed</span>
        </div>
        <div>
            <base-selector :base.sync="inputBase" label="From base:"></base-selector>
        </div>
        <div>
            <base-selector :base.sync="outputBase" label="To base:"></base-selector>
        </div>
    </fieldset>
    <fieldset>
        <legend>Result</legend>
        <label class="result" v-show="result != 0">{{ result }}</label>
    </fieldset>
    <pre class="debug">{{ $data|json }}</pre>
</div>

<template id="base-selector-template">
    <label class="header">{{ label }}</label>
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
<script src="/js/base_converter.js"></script>

<?php self::inject('layout/footer') ?>
