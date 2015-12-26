<?php self::inject('layout/header') ?>

<div class="container-fluid">
    <h1 class="page-header">Square Root</h1>

    <form id="app" v-on:submit.prevent v-cloak>
        <fieldset class="form-group">
            <label class="header">The square root of</label>
            <small class="warning" v-show="inputLengthMaxed">Only {{ inputLengthMax }} digits allowed</small>
            <input type="text"
                class="form-control input-lg"
                @keyup="cleanseInputNumber"
                v-model="inputNumber"
                placeholder="Enter a number (numeric only)"
                autofocus
            >
        </fieldset>
        <h1 class="result" v-show="result"><span class="label label-primary">{{ result }}</span></h1>
        <!-- <pre class="debug">{{ $data|json }}</pre> -->
    </form>
</div>

<script src="/js/vue.js"></script>
<script src="/js/vue-resource.js"></script>
<script src="/js/sqrt.js"></script>

<?php self::inject('layout/footer') ?>
