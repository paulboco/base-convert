<?php self::inject('layout/header') ?>

<h1>Base Converter</h1>

<div id="app" v-cloak>
    <fieldset>
        <legend>Input</legend>
        <div>
            <label class="header" for="inputNumber">Number:</label>
            <input type="text"
                v-model="inputNumber"
                @keyup="convert"
                placeholder="Enter a number"
                autofocus
            >
        </div>
        <div>
            <base-select :base="data:inputBase"></base-select>
        </div>
    </fieldset>
    <fieldset>
        <legend>Output</legend>
        <div>
            <base-select :base="data:outputBase"></base-select>
        </div>
    </fieldset>
    <fieldset>
        <legend>Result</legend>
        <h2 v-show="result != 0">{{ result }}</h2>
    </fieldset>

    <pre class="debug">{{ $data|json }}</pre>
</div>

<template id="base-select">
    <label class="header">Base:</label>
    <label v-for="baseRadioOption in baseRadioOptions">
        <input type="radio"
            value="{{ baseRadioOption.value }}"
            HIDE@change="convert"
            v-model=base
         >
        {{ baseRadioOption.key }}
    </label>
</template>

<script src="/js/main.js"></script>

<?php self::inject('layout/footer') ?>

<!--
    <label class="dropdown">By integer:
        <select v-model="inputBase" @change="convert">
            <?php foreach (range(2, 36) as $base): ?>
                <option value="<?php echo $base ?>"><?php echo $base ?></option>
            <?php endforeach; ?>
        </select>
    </label> -->
