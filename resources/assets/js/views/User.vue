<template>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>Guest Book</h1>
				
				<div class="panel panel-default" v-for="comment in comments">
                    <div class="panel-heading" v-text="comment.username"></div>

					<div class="panel-body" v-text="comment.text"></div>
				</div>

                <vue-paginator :resource_url="resource_url" ref="vpaginator" @update="updateResource" class="pagination"></vue-paginator>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
        components: { VuePaginator },

        data() {
            return {
                comments: [],
                resource_url: '/api/personal'
            }
        },

        methods: {
            updateResource(data){
                this.comments = data
            }
        },
        
        created() {
            if(this.$route.params.id) this.resource_url = '/api/user/' + this.$route.params.id;
        }
    }
</script>
