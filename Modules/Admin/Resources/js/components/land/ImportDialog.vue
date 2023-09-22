<template>
    <GDialog
        v-model="dialog"
        :persistent="isUploading"
        max-width="600"
        height="400"
        scrollable
    >
        <div class="block mx-4 my-4 w-100">
            <!-- <VButton @click="closeDialog()" outlined class="ml-1 mr-1">
                  {{ trans("cancel") }}
                </VButton> -->

            <!-- sample -->
            <div class="block is-full mt-5 pt-5 is-centered">
                <h5 class="mb-3">{{ trans("download_sample_text") }}</h5>
                <VButton
                    color="warning w-100"
                    icon="fas fa-download"
                    elevated
                    class="btn-list"
                    @click="downloadImportSample"
                    :loading="downloadSampleLoading"
                >
                    {{ trans("download_sample") }}
                </VButton>
            </div>
            <!-- import file -->
            <hr class="my-7"/>
            <!-- pick file -->
            <div v-if="!isUploadingFile && !isFileSelected">
                <h4 class="mb-3">{{ trans("pick_file_text") }}</h4>

                <div class="file has-name">
                    <label class="file-label">
                        <input
                            class="file-input"
                            type="file"
                            accept=".xlsx"
                            @change="onPickFile"
                            name="resume"
                        />
                        <span class="file-cta">
              <span class="file-icon">
                <i class="fas fa-upload mx-4"></i>
              </span>
              <span class="file-label"> {{ trans("pick_file") }} </span>
            </span>
                    </label>
                </div>
            </div>
            <!-- upload file -->

            <div v-if="!isUploading && isFileSelected">
                <!-- upload button -->
                <!-- <h4 class="mb-3">{{ trans("upload_file_text") }}</h4> -->

                <div class="file-name-row">
                    <h5 class="">{{ pickedFile?.name }}</h5>
                    <VButton
                        color="danger"
                        elevated
                        class="btn-list"
                        @click="pickedFile = {}"
                    >
                        {{ trans("X") }}
                    </VButton>
                </div>
                <VButton
                    color="primary"
                    icon="fas fa-upload"
                    elevated
                    class="btn-list w-100 mt-2"
                    @click="uploadFile"
                >
                    {{ trans("upload_file") }}
                </VButton>
            </div>
            <!-- uploading file -->
            <div v-if="isUploading">
                <h5>{{ trans("uploading") }}</h5>
                <!-- loader -->
                <progress class="progress is-small is-primary" max="100"></progress>
            </div>
        </div>
    </GDialog>
</template>


<script>
import {GDialog} from "gitart-vue-dialog";
import readXlsxFile from "read-excel-file";
import {Notyf} from "notyf";
import base from "nawadash/src/components/list/mixins/base";
import {useRoute} from "vue-router";

export default {
    props: {
        resource: {
            required: true,
        },
    },
    mixins: [base],

    components: {
        GDialog,
    },
    mounted() {

    },
    data() {
        return {
            dialog: false,
            isUploading: false,
            pickedFile: {},
            downloadSampleLoading: false
        };
    },
    computed: {
        isFileSelected() {
            return this.pickedFile instanceof File;
        },
        project_id_lands() {
            return _.get(this.$router.currentRoute.value,'query.project_id_lands');
        },
    },
    methods: {
        // modal
        openDialog() {
            this.dialog = true;
        },
        closeDialog() {
            this.dialog = false;
        },
        // sample
        downloadImportSample() {
            if (!this.project_id_lands){
                this.errorNotify(this.trans('please_select_project'))
                return;
            }
            this.downloadSampleLoading = true;
            this.request(
                this.$endPoint(`lands.sample_import_excel`),
                {
                    params: {
                        no_pagination : true,
                        'project_id_lands' : this.project_id_lands,
                    }
                },
                ({data}) => {
                    window.open(`/admin/reports/${data.data.filename}`, '_blank')
                },
                null,
                () => {
                    this.downloadSampleLoading = false;
                }
            );
        },
        // pick file
        onPickFile() {
            const file = event.target.files[0];
            this.pickedFile = file;
        },
        // upload file
        uploadFile() {
            this.isUploading = true;
            let $this = this
            // read & prepare data
            const xlsxFile = this.pickedFile;
            const data = [];
            readXlsxFile(xlsxFile).then((rows) => {
                const columns = rows[0];
                for (let i = 0; i < rows.length; i++) {
                    if (i !== 0) {
                        const rowObject = {};
                        for (let y = 0; y < rows[i].length; y++) {
                            rowObject[columns[y]] = rows[i][y];
                        }
                        data.push(rowObject);
                    }
                }

                var notyf = new Notyf();
                this.request(
                    {method: "POST", url: `/api/admin/lands/excel/import`},
                    {
                        data,
                    },
                    function (response) {
                        $this.closeDialog();
                        this.pickedFile = {};
                        this.isUploading = false;
                        // show feedback message
                        notyf.success(response?.data?.message ?? "Data imported successfully.");
                        Bus.emit(`reload-table-${this.resource}`);
                    }.bind(this),
                    function (response) {
                        $this.closeDialog();
                        console.log("REQ error", response);
                        notyf.error(response?.data?.message ?? "An error happened, please try again.");
                        this.isUploading = false;
                    }.bind(this)
                );
            });
        },
    },
};
</script>

<style lang="scss">
.w-100 {
    width: 100%;
}

.file > .file-label {
    display: block;
    width: 100%;
}

.file-cta {
    display: flex;
    justify-content: center;
    border-radius: 5px !important;
}

.file-name-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>
