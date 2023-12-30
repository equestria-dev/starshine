const si = require('systeminformation');

(async () => {
    await si.fsStats();

    const mem = await si.mem();
    const fs = (await si.fsSize()).filter(i => i.type !== "fuse" && i.type !== "nfs" && i.fs.startsWith("/"));
    const cpu = await si.cpu();
    const cpuLoad = await si.currentLoad();
    const proc = await si.processes();
    const fsStats = await si.fsStats();

    const data = {
        ram: Math.round(mem.used + mem.swapused),
        ramTotal: Math.round(mem.total + mem.swaptotal),
        disk: fs.map(i => i.used).reduce((a, b) => a + b),
        diskTotal: fs.map(i => i.size).reduce((a, b) => a + b),
        cores: cpu.cores,
        ghz: cpu.speed,
        ghzMin: cpu.speedMin,
        ghzMax: cpu.speedMax,
        cache: cpu.cache.l1d + cpu.cache.l1i + cpu.cache.l2 + cpu.cache.l3,
        cpuLoad: cpuLoad.currentLoad,
        processes: proc.all,
        io: fsStats.ms,
        kernel: require('os').release().split("-")[0]
    }

    process.stdout.write(JSON.stringify(data));
})();