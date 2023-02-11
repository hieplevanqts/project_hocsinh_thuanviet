<template>
          <ul>
                <li v-for="(menu, index) in menus" class="" :key="index"><a v-bind:href="menu.url == null ? '' : base+'/'+menu.url">{{ menu.name }}</a></li>
                
            </ul>
</template>

<script>
import axios from 'axios';
    export default {
          data() {
            return {
            menus: [],
            errors: [],
            base : 'http://localhost:8000'
            }
        },
        created() {
            axios.get('http://localhost:8000/api/menu/list')
            .then(response => {
                this.menus = response.data.result
                console.log(this.menus);
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
        
    }
</script>

<style lang="scss" scoped>

</style>