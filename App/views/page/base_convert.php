<?php self::inject('layout/header') ?>

<div class="container-fluid">
    <h1 class="page-header">Base Converter</h1>

    <form id="app" v-on:submit.prevent v-cloak>
        <fieldset class="form-group">
            <label class="header">Convert</label>
            <small class="warning" v-show="inputLengthMaxed">Only {{ inputLengthMax }} digits allowed</small>
            <input type="text"
                class="form-control input-lg"
                @keyup="cleanseInputNumber"
                v-model="inputNumber"
                placeholder="Enter a number (alphanumeric only)"
                autofocus
            >
        </fieldset>
        <base-selector :base.sync="inputBase" name="inputBase" label="From base:"></base-selector>
        <base-selector :base.sync="outputBase" name="outputBase" label="To base:"></base-selector>
        <h1 class="result" v-show="result"><span class="label label-primary">{{ result|decimal }}</span></h1>
        <!-- <pre class="debug">{{ $data|json }}</pre> -->
    </form>
</div>

<template id="base-selector-template">
    <div>
        <label class="header">{{ label }}</label>
        <label class="radio-inline" v-for="baseRadioOption in baseRadioOptions">
            <input type="radio"
                value="{{ baseRadioOption.value }}"
                v-model=base
             >
            {{ baseRadioOption.key }}
        </label>
        <span class="form-inline" style="margin-left: 10px;">
            <label for="{{ name }}Select">By integer:</label>
            <select v-model="base" class="form-control" id="{{ name }}Select">
                <option v-for="baseSelectOption in baseSelectOptions" :value="baseSelectOption">{{ baseSelectOption }}</option>
            </select>
        </span>
    </div>
</template>

<script src="/js/vue.js"></script>
<script src="/js/vue-resource.js"></script>
<script src="/js/base_convert.js"></script>

<?php self::inject('layout/footer') ?>
