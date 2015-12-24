<?php self::inject('layout/header') ?>

<div class="container-fluid">
    <h1>Square Root</h1>

    <form id="app" v-on:submit.prevent v-cloak>
        <fieldset class="form-group">
            <label>The square root of:</label>
            <small class="warning" v-show="inputLengthMaxed">Only {{ inputLengthMax }} digits allowed</small>
            <input type="text"
                class="form-control"
                @keyup="cleanseInputNumber"
                v-model="inputNumber"
                placeholder="Enter a number (numeric only)"
                autofocus
            >
        </fieldset>
        <h2 v-show="result">is: <span class="label label-default">{{ result }}</span></h2>
        <!-- <pre class="debug">{{ $data|json }}</pre> -->
    </form>
</div>

<script src="/js/vue.js"></script>
<script src="/js/vue-resource.js"></script>
<script src="/js/sqrt.js"></script>

<?php self::inject('layout/footer') ?>
