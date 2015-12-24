<?php self::inject('layout/header') ?>

<div class="container-fluid">
    <h1>Base Converter</h1>

    <form id="app" v-on:submit.prevent v-cloak>
        <fieldset class="form-group">
            <label>Convert</label>
            <small class="warning" v-show="inputLengthMaxed">Only {{ inputLengthMax }} digits allowed</small>
            <input type="text"
                class="form-control"
                @keyup="cleanseInputNumber"
                v-model="inputNumber"
                placeholder="Enter a number (alphanumeric only)"
                autofocus
            >
        </fieldset>
        <fieldset class="form-group">
            <label>From Base:</label>
            <div>
                <base-selector :base.sync="inputBase" label="From base:"></base-selector>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <label>To Base:</label>
            <div>
                <base-selector :base.sync="outputBase" label="From base:"></base-selector>
            </div>
        </fieldset>
        <h2 v-show="result">Result: <span class="label label-default">{{ result|decimal }}</span></h2>
        <!-- <pre class="debug">{{ $data|json }}</pre> -->
    </form>
</div>

<template id="base-selector-template">
    <label class="radio-inline" v-for="baseRadioOption in baseRadioOptions">
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
<script src="/js/base_convert.js"></script>

<?php self::inject('layout/footer') ?>
