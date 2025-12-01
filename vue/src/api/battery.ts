import {api} from "./axios";

export async function sendBatteryPing(uuid: string, percent: number) {
    const res = await api.post('/api/ping', { uuid, percent });

    if (res.status !== 200) throw new Error(res.statusText);

    return res.data;
}