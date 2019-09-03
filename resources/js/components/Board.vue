<template>
    <div class="d-flex">
        <div class="board-column" v-for="(boardColumn, boardColumnIndex) of boardColumns" :key="boardColumn.id">
            <div class="board-column-title">
                {{ boardColumn.name}}
            </div>
            <draggable :id="boardColumn.id"
                       :list="tasks[boardColumnIndex]"
                       draggable=".board-card"
                       class="board-column-body"
                       @change="onChange($event, boardColumn.id)"
                       :group="columns"
                       animation="150"
            >
                <BoardCard v-for="task of tasks[boardColumnIndex]" :key="task.id"
                           :column-task="task"/>
            </draggable>
        </div>
    </div>
</template>

<script>
    import BoardCard from './BoardCard';
    import draggable from "vuedraggable";
    import axios from 'axios';

    export default {
        data: function () {
            return {
                boardColumns: null,
                tasks: null,
            }
        },
        components: {BoardCard, draggable},
        props: ['columns', 'changeColumnUrl'],
        methods: {
            onChange: function ($event, newColumnId) {
                if ($event.added) {
                    const {id} = $event.added.element;

                    this.changeTaskColumn(id, newColumnId).catch(() => {
                        alert('Something went wrong. Please reload the page')
                    })
                }
            },
            changeTaskColumn: function (taskId, columnId) {
                return axios.put(this.changeColumnUrl, {
                    taskId,
                    columnId,
                })
            }
        },
        created() {
            this.boardColumns = JSON.parse(this.columns);
            console.log(JSON.parse(this.columns));
            this.tasks = this.boardColumns.map(column => {
                return column.tasks;
            })
        },
    }
</script>
<style lang="scss" scoped>
    .board-column {
        display: flex;
        flex-direction: column;
        border-radius: 10px;
        background: #ccc;
        flex: 1;
        margin-right: 20px;

        &:last-child {
            margin-right: 0;
        }

        &-title {
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
            text-align: center;
            padding: 10px;
            text-transform: uppercase;
            background: #333;
            color: #fff;
            border-bottom: 1px solid #fff;
        }

        &-body {
            min-height: 300px;
        }
    }
</style>
