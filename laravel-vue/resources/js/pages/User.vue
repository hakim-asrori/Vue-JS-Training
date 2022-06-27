<template>
    <div>
        <h1>Daftar User</h1>
        <router-link class="btn btn-outline-primary mb-3" to="/user/create">Registrasi</router-link>
        <ul>
            <li v-for="user in users">
                <router-link :to="profile_uri(user.id)">{{  user.name }}</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: []
        }
    },
    mounted() {
        this.getUsers()

        // fetch('/api/users')
        // .then(response => response.json())
        // .then(data => {
        //     this.users = data;
        // })
    },
    methods: {
        getUsers() {
            axios.get('/api/users').then((response) => {
                this.users = response.data;
            })
        },
        profile_uri(id) {
            return '/user/'+id;
        }
    }
}
</script>
