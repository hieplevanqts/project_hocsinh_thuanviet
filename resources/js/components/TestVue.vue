<template>
    <div>
        <h1>xin chào {{ name }}</h1>
        {{ name }}
        <ListNews></ListNews>
        <button @click="testmethod" class="btn btn-primary">Click</button>
    </div>
</template>

<script>
import ListNews from './News/ListNews.vue';

export default {
     components: {
    ListNews
  },    
    data() {
        return {
            name : 'Lee Dong Chul'
        }
    },
    methods:{
        testmethod() {
            alert('Đây là Đài tiếng nói Việt Nam');
        }
    }
}
</script>

<style lang="scss" scoped>

</style>