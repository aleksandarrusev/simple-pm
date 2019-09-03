<template>
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control" v-model="newColumnName" placeholder="Column name">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" @click="addColumn(newColumnName)">
                    Add column
                </button>
            </div>
            <input type="hidden" name="columns" :value="columnDataToJSON">
        </div>
        <div class="d-flex flex-wrap mt-2">
            <draggable :list="columnData"
                       draggable=".label"
                       class=".label-wrapper"
                       @change="onChange($event)"
                       @end="onChange($event)"
                       animation="150"
            >
                <span class="label" v-for="(column, index) of columnData" :key="column.id">
                    <span class="label-name">{{ column.name }}</span>
                    <span class="label-close float-right pl-2" @click="deleteColumn(index)">x</span>
                </span>
            </draggable>
        </div>
    </div>
</template>

<script>
    import draggable from "vuedraggable";

    export default {
        components: {draggable},
        data: function () {
            return {
                newColumnName: '',
                columnData: null,
            }
        },
        computed: {
            columnDataToJSON: function () {
                return JSON.stringify(this.columnData);
            }
        },
        methods: {
            addColumn: function (columnName) {
                this.newColumnName = '';
                this.columnData.push({
                    name: columnName,
                    order: this.columnData.length + 1
                })
            },
            deleteColumn: function (id) {
                this.columnData.splice(id, 1)
            },
            onChange: function () {
                this.columnData = this.columnData.map((column, index) => {
                    return {
                        ...column,
                        order: index + 1,
                    }
                })
            },
        },
        created: function () {
            this.columnData = [
                {
                    name: 'Todo',
                    order: 1
                },
                {
                    name: 'In Progress',
                    order: 2
                },
                {
                    name: 'Done',
                    order: 3
                }
            ]
        }
    }
</script>

<style lang="scss" scoped>
    .label {
        display: inline-block;
        background: #4c4c4c;
        color: #fff;
        padding: 5px 8px;
        margin: 0 8px 8px 0;
        cursor: grab;

        &-close {
            cursor: pointer;
        }
    }
</style>