<template>
	<div className="card mb-7">
		<div className="card-header">
			<h5 className="mb-0">Данные по выгрузке из JSONPLACEHOLDER</h5>
		</div>
		<div className="p-3">
			<my-table :table="table"/>
		</div>
	</div>
</template>

<script>
import MyTable from "./Components/Table";

export default {
	name: "json_view",
	data: () => ({
		table: {
			isLoading: false,
			totalRecordCount: 0,
			sortable: {
				order: "id",
				sort: "asc",
			},
			headers: [],
			rows: [],
		}
	}),
	components: {
		MyTable
	},
	methods: {
		async getTableData()
		{
			const {data} = await this.axios.get('/api/data/json')
			this.table.headers = data.headers
			this.table.rows = data.data
			this.table.totalRecordCount = data.totalRecordCount
		},
		doSearch(){
			this.table.isLoading = false;
		}
	},
	beforeRouteEnter(to, from, next){
		next(vm => {
			vm.table = {
				headers: [],
				rows: [],
			}
			vm.getTableData()
		})
	}
}
</script>

<style scoped>

</style>
