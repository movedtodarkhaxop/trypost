export default {
  async scheduled(_event, env, ctx) {
    const headers = {
      Authorization: `Bearer ${env.CRON_TOKEN}`,
    };

    ctx.waitUntil(
      Promise.all([
        fetch(`${env.TRYPOST_URL}/internal/cron/queue-work`, { method: 'POST', headers }),
        fetch(`${env.TRYPOST_URL}/internal/cron/schedule-run`, { method: 'POST', headers }),
      ]),
    );
  },
};
