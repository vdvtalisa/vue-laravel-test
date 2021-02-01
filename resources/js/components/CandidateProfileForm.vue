<template>
    <div class="row">
        <div class="col-7 offset-2">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label>Summary</label>
                    <textarea class="form-control" v-model="candidateInfo.summary"
                              placeholder="What do you like to do?"></textarea>
                    <div v-if="errors && errors.summary" class="text-danger">{{ errors.summary[0] }}</div>
                </div>
            </div>
            <!-- ... more form fields -->
            <div class="row mt-3 mb-3">
                <div class="col">
                    <label>Tag yourself</label>
                    <span class="text-muted">Add up to six tags that categorize your skill set</span>
                    <multiselect>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="alert alert-success" role="alert" v-if="successMessage">
                        {{successMessage}}
                    </div>
                </div>
            </div>
            <div class="row mr-2 mt-2">
                <div class="col">
                    <button class="btn btn-success btn-lg" @click.prevent="submit()">💾 Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import _ from 'lodash';
    import Multiselect from 'vue-multiselect';

    export default {
        name: "CandidateProfileForm",
        props: {
            'candidate': {
                required: true,
                default() {
                    return {};
                }
            },
            'tags': {
                required: true,
                default() {
                    return '';
                }
            }
        },
        components: {
            Multiselect
        },
        data() {
            const candidate = JSON.parse(this.candidate);
            const allTags = JSON.parse(this.tags);
            const candidateTags = JSON.parse(this.candidateTags);

            return {
                candidateInfo: {
                    summary: _.get(candidate, 'summary') || '',
                    tags: candidateTags,
                },
                allTags,
                errors: [],
                successMessage: null
            };
        },
        methods: {
            submit() {
                this.successMessage = null;
                this.errors = [];

                axios.put(`/candidates/${_.get(this.candidateInfo, 'id')}/edit`, this.candidateInfo)
                .then((response) => {
                    this.successMessage = response.data.message;
                })
                .catch(error => {
                if (error.response.status === 422)
                {
                this.errors = error.response.data.errors || {};
                }
                });
            }
        }
    }
</script>

<style scoped>

</style>
