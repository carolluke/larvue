<template>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Admin Panel</div>

                        <div class="card-body">
                        <router-link :to="{name: 'company'} " class="btn btn-primary"> Company</router-link>
                        <router-link :to="{name: 'company'} " class="btn btn-success"> Employee</router-link>
                        
			<main class="py-4">
                <router-view></router-view>
            </main>

		</div>
	</div>
	</div>
	</div>
	</div>
</template>
<script>
export default{
	data(){
	return{
	company: 'api/company',
	employee: 'api/employee',
	}
	},

}
</script>