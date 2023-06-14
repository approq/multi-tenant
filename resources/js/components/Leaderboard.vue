<template>
    <div>
        <h1>Leaderboard</h1>


        <el-table :data="users" class="w-full border">
            <el-table-column label="Name">
                <template #default="scope">
                    <div class="flex justify-start items-center gap-2">
                        <div>
                            <el-avatar :size="30" :src="scope.row.profile_image">
                                {{ scope.row.name.charAt(0).toUpperCase() }}
                            </el-avatar>
                        </div>
                        <span class="leading-normal">{{ scope.row.name }}</span>
                    </div>
                </template>
            </el-table-column>
            <el-table-column prop="xp_entries_sum_xp" label="Total XP"/>
        </el-table>
    </div>
</template>

<script setup>
import {httpClient} from "../plugins/api-client.js";
import {onMounted, reactive, ref} from "vue";

const users = ref([]);
const usersState = reactive({
    page: 1
})

const fetchUsers = async () => {
    const response = await httpClient.get('/api/leaderboard', {params: usersState});
    users.value = response.data.data;
}

onMounted(fetchUsers)
</script>
