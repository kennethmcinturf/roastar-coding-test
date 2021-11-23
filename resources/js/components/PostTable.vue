<template>
    <div>
        <div class="flex justify-center">
            <h4 class="text-red-900 text-xl">Posts Table</h4>
        </div>

        <div class="flex justify-center">
            <table class="table-auto border-separate border">
              <thead>
                <tr>
                  <th class="border px-4 py-2 font-large">Name</th>
                  <th class="border px-4 py-2 font-large">Description</th>
                  <th class="border px-4 py-2 font-large">Created At</th>
                  <th class="border px-4 py-2 font-large">Updated At</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(post) in posts" :key="post.id">
                    <td class="border px-4 py-2">{{ post.name }}</td>
                    <td class="border px-4 py-2">{{ post.description }}</td>
                    <td class="border px-4 py-2">{{ post.created_at_human_readable }}</td>
                    <td class="border px-4 py-2">{{ post.updated_at_human_readable }}</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: []
            }
        },
        methods: {
            getPosts() {
                axios.get('/api/posts')
                    .then(response => {
                        this.posts = response.data.post;
                    }).catch(error => {
                        console.log(error)
                    })
            }
        },
        beforeMount() {
            this.getPosts();
        }
    }
</script>