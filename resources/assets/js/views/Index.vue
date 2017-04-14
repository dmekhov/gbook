<template>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default" v-for="comment in comments">
					<div class="panel-heading"><a v-if="comment.username" :href="'/user/' + comment.user_id">{{ comment.username }}</a><template v-else>Guest</template></div>
					
					<div class="panel-body" v-text="comment.text"></div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    export default {
        data() {
            return {
                comments: []
            }
        },
        
        created() {
            axios.get('/api/comments')
                .then(response => this.comments = response.data);
        }
    }
</script>
