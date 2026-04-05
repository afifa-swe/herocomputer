<template>
  <div class="case-visual" :class="visualType + '-visual'">
    <!-- VieON -->
    <div v-if="visualType === 'vieon'" class="cv-inner">
      <div class="cv-phone dark-phone">
        <div class="phone-notch"></div>
        <div class="phone-screen">
          <div class="plogo">Vie<span>ON</span></div>
          <div class="pbars">
            <div class="pbar accent" style="width:75%"></div>
            <div class="pbar" style="width:55%"></div>
            <div class="pbar" style="width:85%"></div>
          </div>
          <div class="pplay">▶</div>
        </div>
      </div>
      <div class="cv-stats">
        <div class="cv-stat"><span class="num">10M+</span><span class="lbl">пользователей</span></div>
        <div class="cv-stat"><span class="num">#1</span><span class="lbl">Вьетнам</span></div>
        <div class="cv-stat"><span class="num">Flutter</span><span class="lbl">технология</span></div>
      </div>
    </div>

    <!-- OlaLearn -->
    <div v-else-if="visualType === 'olalearn'" class="cv-inner">
      <div class="ola-screen">
        <div class="ola-header">OlaLearn</div>
        <div class="ola-chat">
          <div class="ola-msg left">Hello! Let's practice 👋</div>
          <div class="ola-msg right">Ready! Let's go</div>
          <div class="ola-msg left">Great! First topic...</div>
          <div class="ola-msg right">I understand!</div>
        </div>
      </div>
      <div class="cv-stats">
        <div class="cv-stat cyan"><span class="num">10K+</span><span class="lbl">студентов</span></div>
        <div class="cv-stat cyan"><span class="num">3 мес</span><span class="lbl">до результата</span></div>
        <div class="cv-stat cyan"><span class="num">⭐ 4.9</span><span class="lbl">рейтинг</span></div>
      </div>
    </div>

    <!-- I+Pharmacy — СВЕТЛАЯ тема -->
    <div v-else-if="visualType === 'pharmacy'" class="cv-inner">
      <div class="pharma-phone light-phone">
        <div class="pharma-screen-light">
          <div class="pharma-logo-light">Rx<span>+</span></div>
          <div class="pharma-search-light">
            <span>🔍</span>
            <div class="search-placeholder"></div>
          </div>
          <div class="pharma-list">
            <div class="pharma-item-light">
              <div class="pharma-icon">💊</div>
              <div class="pharma-lines"><div class="ph-line dark" style="width:70%"></div><div class="ph-line light" style="width:50%"></div></div>
            </div>
            <div class="pharma-item-light">
              <div class="pharma-icon">🩺</div>
              <div class="pharma-lines"><div class="ph-line dark" style="width:80%"></div><div class="ph-line light" style="width:40%"></div></div>
            </div>
            <div class="pharma-item-light">
              <div class="pharma-icon">💉</div>
              <div class="pharma-lines"><div class="ph-line dark" style="width:60%"></div><div class="ph-line light" style="width:55%"></div></div>
            </div>
          </div>
          <div class="pharma-btn-light">Найти в аптеке</div>
        </div>
      </div>
      <div class="cv-stats">
        <div class="cv-stat green"><span class="num">500+</span><span class="lbl">аптек</span></div>
        <div class="cv-stat green"><span class="num">2 мин</span><span class="lbl">до заказа</span></div>
        <div class="cv-stat green"><span class="num">iOS+</span><span class="lbl">Android</span></div>
      </div>
    </div>

    <!-- No There There / Web3 -->
    <div v-else-if="visualType === 'web3'" class="cv-inner">
      <div class="web3-hex">
        <div class="hex-shape"></div>
        <div class="hex-inner">W3</div>
      </div>
      <div class="web3-nodes">
        <div class="web3-node"><div class="ndot purple"></div><div class="nline"></div><div class="nlabel">Blockchain</div></div>
        <div class="web3-node"><div class="ndot blue"></div><div class="nline"></div><div class="nlabel">Generative</div></div>
        <div class="web3-node"><div class="ndot green"></div><div class="nline"></div><div class="nlabel">NFT Assets</div></div>
      </div>
      <div class="cv-stats">
        <div class="cv-stat purple"><span class="num">Web3</span><span class="lbl">платформа</span></div>
        <div class="cv-stat purple"><span class="num">Gen AI</span><span class="lbl">технология</span></div>
      </div>
    </div>

    <!-- Дефолт — для всех остальных кейсов -->
    <div v-else class="cv-inner cv-default">
      <div class="cv-default-label">{{ label }}</div>
      <div class="cv-default-grid">
        <div class="cv-default-bar" style="width:70%"></div>
        <div class="cv-default-bar" style="width:50%"></div>
        <div class="cv-default-bar" style="width:85%"></div>
        <div class="cv-default-bar" style="width:40%"></div>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  type: { type: String, default: 'default' },
  label: { type: String, default: '' },
  color: { type: String, default: '#0d1a2b' },
  color2: { type: String, default: '#10223a' },
})

const visualTypeMap = {
  vieon: 'vieon',
  olalearn: 'olalearn',
  ola: 'olalearn',
  pharmacy: 'pharmacy',
  'rx+': 'pharmacy',
  web3: 'web3',
  'no there, there': 'web3',
}

const visualType = visualTypeMap[props.type?.toLowerCase()] || 'default'
</script>

<style scoped>
.case-visual {
  width: 100%;
  height: clamp(200px, 35vw, 260px);
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
  margin-bottom: 1.75rem;
}
.cv-inner {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  padding: 1.5rem;
  position: relative;
  z-index: 2;
  width: 100%;
  justify-content: center;
}

/* Фоны */
.vieon-visual    { background: linear-gradient(135deg, #05050f 0%, #0d0d2e 60%, #1a1040 100%); }
.olalearn-visual { background: linear-gradient(135deg, #030d1a 0%, #061628 60%, #0a2040 100%); }
.web3-visual     { background: linear-gradient(135deg, #08030f 0%, #130820 60%, #1e0a35 100%); }
.pharmacy-visual { background: linear-gradient(135deg, #f0f8ff 0%, #e8f4fd 50%, #dff0fa 100%); }
.default-visual  { background: linear-gradient(135deg, v-bind(color) 0%, v-bind(color2) 100%); }

/* Свечения */
.vieon-visual::after, .olalearn-visual::after, .web3-visual::after, .default-visual::after {
  content: '';
  position: absolute;
  width: 160px; height: 160px;
  top: -30px; right: -30px;
  border-radius: 50%;
  pointer-events: none;
}
.vieon-visual::after    { background: radial-gradient(circle, rgba(79,142,255,0.18) 0%, transparent 70%); }
.olalearn-visual::after { background: radial-gradient(circle, rgba(6,182,212,0.15) 0%, transparent 70%); }
.web3-visual::after     { background: radial-gradient(circle, rgba(168,85,247,0.15) 0%, transparent 70%); }
.default-visual::after  { background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%); }
.pharmacy-visual::after {
  content: '';
  position: absolute;
  width: 160px; height: 160px;
  top: -30px; right: -30px;
  border-radius: 50%;
  pointer-events: none;
  background: radial-gradient(circle, rgba(59,130,246,0.1) 0%, transparent 70%);
}

/* Телефон тёмный */
.dark-phone {
  width: 80px; height: 148px;
  background: #0a0a0a;
  border-radius: 14px;
  border: 1.5px solid rgba(255,255,255,0.12);
  padding: 6px;
  box-shadow: 0 20px 50px rgba(0,0,0,0.7);
  flex-shrink: 0;
}
.phone-notch {
  width: 24px; height: 4px;
  background: #111; border-radius: 2px;
  position: absolute; top: 9px; left: 50%;
  transform: translateX(-50%);
}
.phone-screen {
  width: 100%; height: 100%;
  background: #000; border-radius: 9px;
  display: flex; flex-direction: column;
  align-items: center; justify-content: center; gap: 6px;
}
.plogo { font-size: 8px; font-weight: 800; color: #fff; letter-spacing: 0.15em; }
.plogo span { color: #4F8EFF; }
.pbars { width: 100%; padding: 0 8px; display: flex; flex-direction: column; gap: 3px; }
.pbar { height: 3px; background: rgba(255,255,255,0.1); border-radius: 2px; }
.pbar.accent { background: #4F8EFF; }
.pplay {
  width: 22px; height: 22px; background: #4F8EFF;
  border-radius: 50%; display: flex; align-items: center;
  justify-content: center; font-size: 8px; color: #fff;
}

/* Телефон светлый */
.light-phone {
  width: 90px; height: 158px;
  background: #ffffff;
  border-radius: 16px;
  border: 1.5px solid rgba(59,130,246,0.2);
  padding: 7px;
  box-shadow: 0 12px 40px rgba(59,130,246,0.15), 0 2px 8px rgba(0,0,0,0.1);
  flex-shrink: 0;
}
.pharma-screen-light {
  width: 100%; height: 100%;
  background: #f8fbff;
  border-radius: 10px;
  display: flex; flex-direction: column;
  padding: 7px; gap: 5px;
}
.pharma-logo-light { font-size: 10px; font-weight: 800; color: #1e40af; letter-spacing: 0.05em; }
.pharma-logo-light span { color: #3b82f6; }
.pharma-search-light {
  display: flex; align-items: center; gap: 3px;
  background: #fff; border-radius: 4px;
  border: 1px solid #dbeafe;
  padding: 2px 4px; height: 14px; font-size: 7px;
}
.search-placeholder { flex: 1; height: 2px; background: #dbeafe; border-radius: 1px; }
.pharma-list { display: flex; flex-direction: column; gap: 4px; flex: 1; }
.pharma-item-light { display: flex; align-items: center; gap: 4px; }
.pharma-icon { font-size: 8px; }
.pharma-lines { display: flex; flex-direction: column; gap: 2px; flex: 1; }
.ph-line { height: 2.5px; border-radius: 2px; }
.ph-line.dark { background: #93c5fd; }
.ph-line.light { background: #dbeafe; }
.pharma-btn-light {
  background: #2563eb; color: #fff;
  font-size: 6px; font-weight: 700;
  border-radius: 5px; padding: 4px;
  text-align: center; letter-spacing: 0.03em;
}

/* Статистика */
.cv-stats { display: flex; flex-direction: column; gap: 10px; }
.cv-stat { display: flex; flex-direction: column; }
.cv-stat .num { font-size: 18px; font-weight: 800; color: #fff; line-height: 1; }
.cv-stat .lbl { font-size: 9px; text-transform: uppercase; letter-spacing: 0.08em; margin-top: 2px; color: #4F8EFF; }
.cv-stat.cyan .lbl { color: #06B6D4; }
.cv-stat.green .lbl { color: #22c55e; }
.cv-stat.green .num { color: #1e293b; }
.cv-stat.purple .lbl { color: #a855f7; }
.pharmacy-visual .cv-stats .num { color: #1e293b; }

/* OlaLearn */
.ola-screen {
  width: 110px; height: 150px;
  background: #060f1c; border-radius: 10px;
  border: 1px solid rgba(6,182,212,0.2);
  padding: 10px; flex-shrink: 0;
}
.ola-header { font-size: 9px; font-weight: 700; color: #06B6D4; margin-bottom: 8px; letter-spacing: 0.1em; }
.ola-chat { display: flex; flex-direction: column; gap: 5px; }
.ola-msg { padding: 4px 7px; border-radius: 8px; font-size: 7px; line-height: 1.3; max-width: 90%; }
.ola-msg.left  { background: rgba(6,182,212,0.12); color: #94a3b8; border-bottom-left-radius: 2px; }
.ola-msg.right { background: #06B6D4; color: #fff; border-bottom-right-radius: 2px; align-self: flex-end; }

/* Web3 */
.web3-hex { width: 70px; height: 70px; position: relative; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.hex-shape {
  width: 56px; height: 56px;
  background: rgba(168,85,247,0.15);
  border: 1px solid rgba(168,85,247,0.3);
  border-radius: 12px; transform: rotate(45deg); position: absolute;
}
.hex-inner { font-size: 12px; font-weight: 800; color: #a855f7; position: relative; z-index: 1; }
.web3-nodes { display: flex; flex-direction: column; gap: 8px; }
.web3-node { display: flex; align-items: center; gap: 6px; }
.ndot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }
.ndot.purple { background: #a855f7; }
.ndot.blue   { background: #4F8EFF; }
.ndot.green  { background: #22c55e; }
.nline { width: 20px; height: 1px; background: rgba(168,85,247,0.3); }
.nlabel { font-size: 9px; color: #94a3b8; }

/* Дефолт */
.cv-default {
  flex-direction: column;
  gap: 1rem;
}
.cv-default-label {
  font-family: 'Montserrat', sans-serif;
  font-size: clamp(1rem, 3vw, 1.6rem);
  font-weight: 800;
  color: rgba(255,255,255,.15);
  letter-spacing: .15em;
  text-transform: uppercase;
}
.cv-default-grid {
  display: flex;
  flex-direction: column;
  gap: 4px;
  width: 60%;
}
.cv-default-bar {
  height: 3px;
  background: rgba(255,255,255,.08);
  border-radius: 2px;
}

/* Мобайл */
@media (max-width: 480px) {
  .case-visual { height: clamp(180px, 50vw, 220px); }
  .cv-inner { gap: 1rem; padding: 1rem; }
  .dark-phone, .light-phone { width: 65px; height: 120px; }
  .cv-stat .num { font-size: 14px; }
  .ola-screen { width: 85px; height: 120px; }
}
</style>
