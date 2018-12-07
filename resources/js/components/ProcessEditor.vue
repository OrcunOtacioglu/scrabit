<template>
    <div class="row">
        <!-- Process List -->
        <div class="col-md-7">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Process</h4>
                    <div class="card-header-action">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#itemCreation">
                            <i class="fa fa-plus-circle"></i> Add Step
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-info alert-dismissible show fade" v-if="items.length < 1">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            There are no steps to show. Start with adding a step.
                        </div>
                    </div>
                    <draggable class="list-group" v-model="process" @start="drag=true" @end="drag=false" @change="saveProcess()" v-else>
                        <div v-for="item in process" :key="item.reference" class="list-group-item list-group-item-action flex-column align-items-start">
                            <i class="fa fa-bars drag-holder"></i>
                            <div class="d-flex justify-content-between ml-25">
                                <h5 class="mb-1">{{ item.name }}</h5>
                                <small>
                                    <a data-toggle="collapse" :data-target="'#' + item.reference">Edit Details</a>
                                </small>
                            </div>
                            <span class="badge badge-light badge-pill float-right">{{ item.action }}</span>
                            <div class="collapse" :id="item.reference">
                                <div class="form-group">
                                    <label for="action">Action</label>
                                    <select name="action" id="action" class="form-control">
                                        <option value="click">Click</option>
                                        <option value="crawl">Crawl</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </draggable>
                </div>
            </div>
        </div>
        <!-- End Process List -->

        <!-- Output List -->
        <div class="col-md-7">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Output Format</h4>
                </div>
                <div class="card-body">
                    <div class="dd">
                        <ol class="dd-list">
                            <li v-for="format in output" class="dd-item" :data-reference="format.reference">
                                <div class="dd-handle">{{ format.name }}</div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Output List -->
    </div>
</template>

<script>
    import draggable from 'vuedraggable';

    export default {
        data: function () {
            return {
                crawlerID: document.getElementById('dashboard').dataset.crawler,
                process:[],
                rawOutput: [],
                output: [],
                items: [],
            }
        },
        computed: {
            showOutput: function () {
                return this.process.length > 0;
            }
        },
        methods: {
            getItems() {
                axios.get('/dashboard/crawlers/' + this.crawlerID + '/items')
                    .then(response => {
                        this.items = response.data;
                        this.getProcess();
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            getProcess() {
                axios.get('/dashboard/crawlers/' + this.crawlerID + '/process')
                    .then(response => {
                        if (Object.keys(response.data).length === 0 && response.data.constructor === Object) {
                            this.process = this.items;
                        } else {
                            this.process = response.data;
                        }
                        this.getOutputFormat();
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            saveProcess() {
                axios({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'post',
                    url: '/dashboard/crawlers/' + this.crawlerID + '/process',
                    data: {
                        process: this.process
                    }
                })
                    .then(response => {
                        if (response.status === 201) {
                            iziToast.success({
                                title: 'Success!',
                                message: 'Process saved successfully.',
                                position: 'topRight'
                            })
                        } else {
                            iziToast.error({
                                title: 'Error!',
                                message: 'Process not saved',
                                position: 'topRight'
                            })
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            getOutputFormat() {
                axios.get('/dashboard/crawlers/' + this.crawlerID + '/output')
                    .then(response => {
                        if (Object.keys(response.data).length === 0 && response.data.constructor === Object) {
                            this.generateOutput();
                        } else {
                            this.output = response.data;
                        }
                        $('.dd-empty').remove();
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            generateOutput() {
                for(let i = 0; i < this.process.length; i++) {
                    let singleItem = {
                        reference: this.process[i]['reference'],
                        name: this.process[i]['name']
                    };
                    this.output.push(singleItem);
                }
            },
            saveOutput(jsonData) {
                this.rawOutput = jsonData;

                axios({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'post',
                    url: '/dashboard/crawlers/' + this.crawlerID + '/output',
                    data: {
                        output: this.rawOutput
                    }
                })
                    .then(response => {
                        if (response.status === 201) {
                            iziToast.success({
                                title: 'Success!',
                                message: 'Output format changed successfully.',
                                position: 'topRight'
                            })
                        } else {
                            iziToast.error({
                                title: 'Error!',
                                message: 'Output format not saved',
                                position: 'topRight'
                            })
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    })
            }
        },
        mounted() {
            this.getItems();
        },
        components: {
            draggable,
        }
    }
</script>

<style scoped>

</style>