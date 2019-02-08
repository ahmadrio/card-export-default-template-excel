<template>
    <card class="card flex flex-col card-panel">
        <div class="px-3 py-3">
            <h1 class="text-lg font-bold">Export Default Template</h1>
            <form ref="form" @submit.prevent="processExport">
                <div class="py-4">
                    <ul class="list-reset">
                        <li>Resource Name: {{ this.card.resourceLabel }}</li>
                        <li>File Name: {{ this.card.resource }}.xls</li>
                    </ul>
                </div>
                <div class="flex">
                    <button type="submit" class="btn btn-default btn-primary ml-auto mt-auto"><span>Export</span></button>
                </div>
            </form>
        </div>
    </card>
</template>

<script>
export default {
    props: ['card'],

    mounted() {
    },

    methods: {
        processExport() {
            let formData = new FormData;
            formData.append('resourceModel', this.card.resourceModel);
            formData.append('resourceDefaultTemplate', this.card.resourceDefaultTemplate);
            formData.append('resource', this.card.resource);
            axios.post('/nova-vendor/card-export-default-template-excel/endpoint/' + this.card.resource, formData, {
                responseType: 'blob',
            }).then((response) => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', this.card.resource + '.xlsx');
                document.body.appendChild(link);
                link.click();
                this.$toasted.success('Success Export.');
            })
        }
    },

    computed: {},
}
</script>
