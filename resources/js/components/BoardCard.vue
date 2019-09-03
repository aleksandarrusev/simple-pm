<template>
    <div class="board-card">
        <div class="board-card-row board-card-header">
            Title: <strong>{{ task.name}}</strong></div>
        <div class="board-card-row board-card-body">
            Assignee: <span>{{ task.assignee.name }}</span>
        </div>
        <div class="board-card-row board-card-footer">
            <span>Type: <span :class="task.type">{{ task.type }}</span></span>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                task: null,
            }
        },
        props: ['column-task'],
        created() {
            this.task = this.columnTask;
        }
    }
</script>
<style lang="scss" scoped>
    .board-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background: #fff;
        border: 1px solid #d4d4d4;
        padding: 10px;
        margin: 5px 2px;

        &-row {
            padding:8px 0;
        }

        &-footer {
            .bug {
                color: red;
            }

            .story {
                color: green;
            }
        }
    }
</style>
