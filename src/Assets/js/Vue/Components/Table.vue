<template>
	<vue-table-lite
		:is-static-mode="true"
		:is-loading="table.isLoading"
		:columns="table.headers"
		:rows="table.rows"
		:total="table.totalRecordCount"
		:sortable="table.sortable"
		@is-finished="tableLoadingFinish"
		class="w-full"
	/>
</template>

<script>
export default {
	name: "Table",
	props: {
		table: {
			type: Object,
			required: true,
			default: {
				isLoading: false,
				totalRecordCount: 0,
				sortable: {
					order: "id",
					sort: "asc",
				},
				headers: [],
				rows: [],
			}
		},
	},
	methods: {
		tableLoadingFinish(){
			this.table.isLoading = false;
		},
	}
}
</script>
