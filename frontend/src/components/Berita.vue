<template>
    <div>
        <router-link to="/berita/create">Add Data</router-link>
        <table>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Berita</th>
                <th>Kategori</th>
                <th>Action</th>
            </tr>
            <tr v-for="(post, i) in posts" :key="i">
                <td>{{ i + 1 }}</td>
                <td>{{ post.judul }}</td>
                <td>{{ post.post }}</td>
                <td>{{ post.category.nama_category}}</td>
                <td>
                    <router-link :to="'/berita/' + post.id">Edit</router-link>
                    <button @click="deleteRow(post.id)">Delete</button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
    import { api } from '@/helper/api'

    export default {
        name: 'Berita',
        data() {
            return {
                posts: []
            }
        },
        mounted() {
            this.get()
        },
        methods: {
            get() {
                api.get('post').then(res => {
                    if (res.data.status === 'success') {
                        this.posts = res.data.result
                    } else {
                        console.log(res.data.message)
                    }
                }).catch(err => {
                    console.log(err)
                })
            },
            deleteRow(id) {
                api.delete('post/' + id).then(res => {
                    if (res.data.status === 'success') {
                        this.get()
                    } else {
                        console.log(res.data.message)
                    }
                }).catch(err => {
                    console.log(err)
                })
            }
        }
    }
</script>