<template>
  <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <slot/>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'AuthLayout'
}

</script>
