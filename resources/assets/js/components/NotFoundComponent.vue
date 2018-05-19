<template>
    <h1>No existe amigo</h1>
</template>
<script>
    export default {
        beforeCreate(){
            this.$router.push('/login');
        }   
    }
</script>

