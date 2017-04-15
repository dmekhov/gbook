<template>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>Guest Book</h1>
				
				<div class="panel panel-default" v-for="comment in comments">
                    <div class="panel-heading" v-text="comment.username"></div>

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
            let url = this.$route.params.id ? '/api/user/' + this.$route.params.id : '/api/personal';
            axios.get(url)
                .then(response => this.comments = response.data)
                .catch(function (error) {
                    if(error.response && error.response.status == 401) window.location.href = "/";
                });

        }
    }
</script>
