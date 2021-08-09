<template>
    <div>
        <p>This is Dashboard, welcome {{name}}</p>
    </div>
</template>

<script>
    export default {
        props: ['name', 'email']
    }
</script>
