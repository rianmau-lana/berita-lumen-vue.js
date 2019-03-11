<template>
    <div>
        <form @submit.prevent="submitForm">
            <div>
                <label>Judul</label>
                <input type="text" v-model="posts.judul">
            </div>
            <div>
                <label>Isi Berita</label>
                <textarea v-model="posts.post"></textarea>
            </div>
            <div>
                <label>Kategori</label>
                <input type="text" v-model="posts.id_category">
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
</template>

<script>
    import { api } from '@helper/api'

    export default {
        name: 'BeritaForm',
        data() {
            return {
                posts: {
                    id: null,
                    judul: '',
                    post: '',
                    id_category: ''
                }
            }
        },
        methods: {
            submitForm() {
                let data = this.posts
                let url = 'posts'

                api.post(url, data).then(res => {
                    if (res.data.status === 'success') {
                        this.$router.push('/berita')
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