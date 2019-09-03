<template>
    <div class="form-group">
        <label for="users">Select members</label>
        <select class="custom-select" name="users" id="users" @change="onChange($event)">
            <option value="">Select user</option>
            <option v-for="(user, index) of allUsers"
                    :value="index"
                    :key="user.id"
            >
                {{ user.name }}
            </option>
        </select>
        <input type="hidden" name="users" :value="usersToJSON">

        <div class="d-flex flex-wrap mt-2">
            <span class="label" v-for="(selectedUser, index) of selectedUsers" :key="selectedUser.name">
                <span class="label-name">{{ selectedUser.name }}</span>
                <span class="label-close float-right pl-2" @click="deleteUser(index)">x</span>
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                allUsers: [],
                selectedUsers: [],
            }
        },
        computed: {
            usersToJSON: function () {
                const ids = this.selectedUsers.map((user) =>user.id);
                return JSON.stringify(ids);
            }
        },
        methods: {
            addUser: function (user) {
                if (!this.selectedUsers.find(item => item.id === user.id)) {
                    this.selectedUsers.push(user);
                }
            },
            deleteUser: function (id) {
                this.selectedUsers.splice(id, 1)
            },
            onChange: function (e) {
                const index = e.target.value;
                index && this.addUser(this.allUsers[index]);
            },
        },
        props: ['users', 'existingUsers'],
        created: function () {
            this.allUsers = JSON.parse(this.users);
            if(this.existingUsers) {
                this.selectedUsers = JSON.parse(this.existingUsers);
            }
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