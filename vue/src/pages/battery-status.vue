<template>
  <div>
      <h2>Battery Status</h2>
      <BatteryStatusForm v-if="!status" @onSubmit="handleBatteryForm" :loading="loading" />
    </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import {sendBatteryPing} from "../api/battery";
import StatusMesssage from "../components/status/status-message.vue";
import BatteryStatusForm from "../components/battery-status/battery-status-form.vue";

interface BatteryStatus {
  uuid: string;
  percent: number;
}

interface StatusResult {
  type: "success" | "error",
  message?: string;
}

const loading = ref(false);

const handleBatteryForm = async (data: BatteryStatus) => {
  loading.value = true;
  const result = await sendBatteryPing(data.uuid, data.percent);
  loading.value = false;
}
</script>