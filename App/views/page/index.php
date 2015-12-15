<?php self::inject('layout/header') ?>

<h1>Base Converter</h1>

<div id="app" v-cloak>
    <fieldset>
        <legend>Input</legend>
        <div>
            <label class="header" for="inputNumber">Number:</label>
            <input type="text"
                name="inputNumber"
                v-model="inputNumber"
                @keyup="convert"
                placeholder="Enter a number"
                autofocus
            >
        </div>
        <div>
            <label class="header" for="inputBase">Base:</label>
            <label v-for="baseOption in baseOptions">
                <input type="radio"
                    name="inputBase"
                    value="{{ baseOption.value }}"
                    @change="convert"
                    v-model="inputBase"
                 >
                {{ baseOption.key }}
            </label>
            <label class="dropdown">By integer:
                <select v-model="inputBase" @change="convert">
                    <?php foreach (range(2, 36) as $base): ?>
                        <option value="<?php echo $base ?>"><?php echo $base ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <legend>Output</legend>
        <div>
            <label class="header" for="outputBase">Base:</label>
            <label v-for="baseOption in baseOptions">
                <input type="radio"
                    name="outputBase"
                    value="{{ baseOption.value }}"
                    @change="convert"
                    v-model="outputBase"
                 >
                {{ baseOption.key }}
            </label>
            <label class="dropdown">By integer:
                <select v-model="outputBase" @change="convert">
                    <?php foreach (range(2, 36) as $base): ?>
                        <option value="<?php echo $base ?>"><?php echo $base ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <legend>Result</legend>
        <h2 v-show="result != 0">{{ result }}</h2>
    </fieldset>

    <pre class="debug">{{ $data|json }}</pre>
</div>

<script src="/js/main.js"></script>

<?php self::inject('layout/footer') ?>
