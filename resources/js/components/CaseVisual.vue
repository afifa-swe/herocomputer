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

    <!-- PayFlow -->
    <div v-else-if="visualType === 'payflow'" class="cv-inner payflow-content">
      <div class="cv-phone dark-phone">
        <div class="phone-notch"></div>
        <div class="phone-screen">
          <div class="pf-balance">$12,450</div>
          <div class="pf-label">баланс</div>
          <div class="pf-card">
            <div class="pf-card-num">•••• 4821</div>
            <div class="pf-card-logo">VISA</div>
          </div>
          <div class="pf-rows">
            <div class="pf-row"><div class="pf-dot g"></div><div class="pf-line" style="width:65%"></div><div class="pf-amt g">+$230</div></div>
            <div class="pf-row"><div class="pf-dot r"></div><div class="pf-line" style="width:50%"></div><div class="pf-amt r">-$45</div></div>
          </div>
        </div>
      </div>
      <div class="cv-stats">
        <div class="cv-stat emerald"><span class="num">50K+</span><span class="lbl">транзакций</span></div>
        <div class="cv-stat emerald"><span class="num">12ms</span><span class="lbl">скорость</span></div>
        <div class="cv-stat emerald"><span class="num">PCI DSS</span><span class="lbl">сертификат</span></div>
      </div>
    </div>

    <!-- CargoTrack -->
    <div v-else-if="visualType === 'cargotrack'" class="cv-inner cargo-content">
      <div class="cargo-map">
        <div class="cargo-map-bg">
          <div class="cargo-route">
            <div class="cargo-city a">AZ</div>
            <div class="cargo-path">
              <div class="cargo-dot moving"></div>
            </div>
            <div class="cargo-city b">DE</div>
          </div>
          <div class="cargo-grid"></div>
        </div>
      </div>
      <div class="cv-stats">
        <div class="cv-stat amber"><span class="num">98%</span><span class="lbl">точность</span></div>
        <div class="cv-stat amber"><span class="num">GPS</span><span class="lbl">реал. время</span></div>
        <div class="cv-stat amber"><span class="num">500+</span><span class="lbl">маршрутов</span></div>
      </div>
    </div>

    <!-- Bazario -->
    <div v-else-if="visualType === 'bazario'" class="cv-inner bazario-content">
      <div class="cv-phone dark-phone">
        <div class="phone-notch"></div>
        <div class="phone-screen">
          <div class="baz-header">Bazario</div>
          <div class="baz-grid">
            <div class="baz-item"><div class="baz-img"></div><div class="baz-price">$24</div></div>
            <div class="baz-item"><div class="baz-img accent"></div><div class="baz-price">$18</div></div>
            <div class="baz-item"><div class="baz-img"></div><div class="baz-price">$32</div></div>
            <div class="baz-item"><div class="baz-img dark"></div><div class="baz-price">$55</div></div>
          </div>
          <div class="baz-btn">В корзину</div>
        </div>
      </div>
      <div class="cv-stats">
        <div class="cv-stat rose"><span class="num">5K+</span><span class="lbl">продавцов</span></div>
        <div class="cv-stat rose"><span class="num">Stripe</span><span class="lbl">платежи</span></div>
        <div class="cv-stat rose"><span class="num">RT чат</span><span class="lbl">поддержка</span></div>
      </div>
    </div>

    <!-- PropDesk -->
    <div v-else-if="visualType === 'propdesk'" class="cv-inner propdesk-content">
      <div class="prop-screen">
        <div class="prop-header">PropDesk CRM</div>
        <div class="prop-card">
          <div class="prop-card-img"></div>
          <div class="prop-card-info">
            <div class="prop-addr"></div>
            <div class="prop-price">$285,000</div>
            <div class="prop-tags">
              <div class="prop-tag">3 комн</div>
              <div class="prop-tag">78м²</div>
            </div>
          </div>
        </div>
        <div class="prop-leads">
          <div class="prop-lead-item"><div class="prop-avatar a">АК</div><div class="prop-lead-line"></div></div>
          <div class="prop-lead-item"><div class="prop-avatar b">МЛ</div><div class="prop-lead-line short"></div></div>
        </div>
      </div>
      <div class="cv-stats">
        <div class="cv-stat violet"><span class="num">CRM</span><span class="lbl">платформа</span></div>
        <div class="cv-stat violet"><span class="num">360°</span><span class="lbl">вирт. тур</span></div>
        <div class="cv-stat violet"><span class="num">AWS S3</span><span class="lbl">хранение</span></div>
      </div>
    </div>

    <!-- FreshBox -->
    <div v-else-if="visualType === 'freshbox'" class="cv-inner freshbox-content">
      <div class="cv-phone dark-phone" style="background:#061008;border-color:rgba(34,197,94,0.15)">
        <div class="phone-notch"></div>
        <div class="phone-screen" style="background:#040c06">
          <div class="fb-logo">Fresh<span>Box</span></div>
          <div class="fb-box">
            <div class="fb-item">🥦</div>
            <div class="fb-item">🍎</div>
            <div class="fb-item">🥕</div>
          </div>
          <div class="fb-timer">⏱ 45 мин</div>
          <div class="fb-bar"><div class="fb-fill"></div></div>
          <div class="fb-btn-g">Заказать бокс</div>
        </div>
      </div>
      <div class="cv-stats">
        <div class="cv-stat fresh"><span class="num">45 мин</span><span class="lbl">доставка</span></div>
        <div class="cv-stat fresh"><span class="num">100+</span><span class="lbl">ферм</span></div>
        <div class="cv-stat fresh"><span class="num">⭐ 4.8</span><span class="lbl">рейтинг</span></div>
      </div>
    </div>

    <!-- TeamPulse -->
    <div v-else-if="visualType === 'teampulse'" class="cv-inner teampulse-content">
      <div class="tp-screen">
        <div class="tp-header">TeamPulse</div>
        <div class="tp-chart">
          <div class="tp-bar" style="height:40%"></div>
          <div class="tp-bar" style="height:70%"></div>
          <div class="tp-bar accent" style="height:90%"></div>
          <div class="tp-bar" style="height:55%"></div>
          <div class="tp-bar" style="height:80%"></div>
        </div>
        <div class="tp-score">
          <div class="tp-score-num">87<span>%</span></div>
          <div class="tp-score-lbl">вовлечённость</div>
        </div>
        <div class="tp-teams">
          <div class="tp-team"><div class="tp-av o">DE</div><div class="tp-tl"></div></div>
          <div class="tp-team"><div class="tp-av b">HR</div><div class="tp-tl short"></div></div>
        </div>
      </div>
      <div class="cv-stats">
        <div class="cv-stat orange"><span class="num">OKR</span><span class="lbl">трекинг</span></div>
        <div class="cv-stat orange"><span class="num">360°</span><span class="lbl">обратная связь</span></div>
        <div class="cv-stat orange"><span class="num">Slack</span><span class="lbl">интеграция</span></div>
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
  payflow: 'payflow',
  cargotrack: 'cargotrack',
  bazario: 'bazario',
  propdesk: 'propdesk',
  freshbox: 'freshbox',
  teampulse: 'teampulse',
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
.payflow-visual   { background: linear-gradient(135deg, #021a0e 0%, #042d14 50%, #065c22 100%); }
.cargotrack-visual { background: linear-gradient(135deg, #0d1206 0%, #1a2008 50%, #2d3a0a 100%); }
.bazario-visual  { background: linear-gradient(135deg, #1a0608 0%, #2d0a0e 50%, #4a0f14 100%); }
.propdesk-visual { background: linear-gradient(135deg, #0d0618 0%, #1a0d2e 50%, #2d1a4e 100%); }
.freshbox-visual { background: linear-gradient(135deg, #021206 0%, #042010 50%, #065c22 100%); }
.teampulse-visual { background: linear-gradient(135deg, #150a02 0%, #2a1204 50%, #3d1a06 100%); }
.default-visual  { background: linear-gradient(135deg, v-bind(color) 0%, v-bind(color2) 100%); }

/* Свечения */
.vieon-visual::after, .olalearn-visual::after, .web3-visual::after, .default-visual::after,
.payflow-visual::after, .cargotrack-visual::after, .bazario-visual::after,
.propdesk-visual::after, .freshbox-visual::after, .teampulse-visual::after {
  content: '';
  position: absolute;
  width: 160px; height: 160px;
  top: -30px; right: -30px;
  border-radius: 50%;
  pointer-events: none;
}
.vieon-visual::after     { background: radial-gradient(circle, rgba(79,142,255,0.18) 0%, transparent 70%); }
.olalearn-visual::after  { background: radial-gradient(circle, rgba(6,182,212,0.15) 0%, transparent 70%); }
.web3-visual::after      { background: radial-gradient(circle, rgba(168,85,247,0.15) 0%, transparent 70%); }
.payflow-visual::after   { background: radial-gradient(circle, rgba(16,185,129,0.2) 0%, transparent 70%); }
.cargotrack-visual::after { background: radial-gradient(circle, rgba(202,138,4,0.18) 0%, transparent 70%); }
.bazario-visual::after   { background: radial-gradient(circle, rgba(225,29,72,0.15) 0%, transparent 70%); }
.propdesk-visual::after  { background: radial-gradient(circle, rgba(139,92,246,0.18) 0%, transparent 70%); }
.freshbox-visual::after  { background: radial-gradient(circle, rgba(34,197,94,0.18) 0%, transparent 70%); }
.teampulse-visual::after { background: radial-gradient(circle, rgba(234,88,12,0.18) 0%, transparent 70%); }
.default-visual::after   { background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%); }
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
.cv-stat.emerald .lbl { color: #10b981; }
.cv-stat.amber .lbl { color: #f59e0b; }
.cv-stat.rose .lbl { color: #fb7185; }
.cv-stat.violet .lbl { color: #a78bfa; }
.cv-stat.fresh .lbl { color: #4ade80; }
.cv-stat.orange .lbl { color: #fb923c; }
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

/* PayFlow */
.payflow-content { display: flex; align-items: center; gap: 16px; z-index: 2; position: relative; }
.pf-balance { font-size: 14px; font-weight: 800; color: #10b981; }
.pf-label { font-size: 7px; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.1em; }
.pf-card {
  width: 58px; height: 32px;
  background: linear-gradient(135deg, #065f46, #047857);
  border-radius: 4px;
  border: 1px solid rgba(16,185,129,0.3);
  display: flex; align-items: flex-end;
  justify-content: space-between;
  padding: 4px;
}
.pf-card-num { font-size: 6px; color: rgba(255,255,255,0.6); }
.pf-card-logo { font-size: 7px; font-weight: 800; color: #fff; font-style: italic; }
.pf-rows { width: 100%; padding: 0 4px; display: flex; flex-direction: column; gap: 3px; }
.pf-row { display: flex; align-items: center; gap: 3px; }
.pf-dot { width: 5px; height: 5px; border-radius: 50%; flex-shrink: 0; }
.pf-dot.g { background: #10b981; }
.pf-dot.r { background: #ef4444; }
.pf-line { height: 2px; background: rgba(255,255,255,0.08); border-radius: 1px; flex: 1; }
.pf-amt { font-size: 7px; font-weight: 700; }
.pf-amt.g { color: #10b981; }
.pf-amt.r { color: #ef4444; }

/* CargoTrack */
.cargo-content { display: flex; align-items: center; gap: 16px; z-index: 2; position: relative; }
.cargo-map {
  width: 120px; height: 100px;
  background: rgba(0,0,0,0.3);
  border-radius: 10px;
  border: 1px solid rgba(202,138,4,0.2);
  overflow: hidden; position: relative; flex-shrink: 0;
}
.cargo-map-bg {
  width: 100%; height: 100%;
  background: repeating-linear-gradient(
    0deg, transparent, transparent 14px, rgba(202,138,4,0.05) 14px, rgba(202,138,4,0.05) 15px
  ),
  repeating-linear-gradient(
    90deg, transparent, transparent 14px, rgba(202,138,4,0.05) 14px, rgba(202,138,4,0.05) 15px
  );
  display: flex; align-items: center; justify-content: center;
}
.cargo-route { display: flex; align-items: center; gap: 6px; }
.cargo-city {
  width: 20px; height: 20px;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 7px; font-weight: 800;
}
.cargo-city.a { background: rgba(202,138,4,0.3); border: 1px solid #ca8a04; color: #fbbf24; }
.cargo-city.b { background: rgba(79,142,255,0.3); border: 1px solid #4F8EFF; color: #93c5fd; }
.cargo-path {
  flex: 1; height: 2px;
  background: rgba(202,138,4,0.3);
  border-radius: 1px;
  position: relative;
}
.cargo-dot {
  width: 6px; height: 6px;
  background: #fbbf24;
  border-radius: 50%;
  position: absolute;
  top: -2px;
  animation: moveCargo 2s linear infinite;
  box-shadow: 0 0 6px #fbbf24;
}
@keyframes moveCargo {
  0% { left: 0; }
  100% { left: calc(100% - 6px); }
}

/* Bazario */
.bazario-content { display: flex; align-items: center; gap: 16px; z-index: 2; position: relative; }
.baz-header { font-size: 9px; font-weight: 800; color: #fb7185; letter-spacing: 0.1em; }
.baz-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 3px; width: 100%; padding: 0 2px; }
.baz-item { display: flex; flex-direction: column; gap: 2px; }
.baz-img { height: 22px; border-radius: 3px; background: rgba(255,255,255,0.06); }
.baz-img.accent { background: rgba(225,29,72,0.2); }
.baz-img.dark { background: rgba(255,255,255,0.03); }
.baz-price { font-size: 7px; font-weight: 700; color: #fb7185; }
.baz-btn {
  background: #e11d48; color: #fff;
  font-size: 7px; font-weight: 700;
  border-radius: 4px; padding: 4px 0;
  text-align: center; width: 100%;
}

/* PropDesk */
.propdesk-content { display: flex; align-items: center; gap: 16px; z-index: 2; position: relative; }
.prop-screen {
  width: 120px; height: 150px;
  background: #0f0a1e;
  border-radius: 10px;
  border: 1px solid rgba(139,92,246,0.2);
  padding: 8px; flex-shrink: 0;
  display: flex; flex-direction: column; gap: 6px;
}
.prop-header { font-size: 8px; font-weight: 700; color: #a78bfa; letter-spacing: 0.08em; }
.prop-card { display: flex; gap: 6px; }
.prop-card-img {
  width: 38px; height: 38px;
  border-radius: 5px;
  background: linear-gradient(135deg, rgba(139,92,246,0.3), rgba(109,40,217,0.2));
  border: 1px solid rgba(139,92,246,0.15);
  flex-shrink: 0;
}
.prop-card-info { flex: 1; display: flex; flex-direction: column; gap: 2px; }
.prop-addr { height: 3px; background: rgba(255,255,255,0.1); border-radius: 2px; width: 80%; }
.prop-price { font-size: 8px; font-weight: 800; color: #c4b5fd; }
.prop-tags { display: flex; gap: 3px; }
.prop-tag {
  font-size: 6px; color: #a78bfa;
  background: rgba(139,92,246,0.1);
  border-radius: 3px; padding: 1px 4px;
}
.prop-leads { display: flex; flex-direction: column; gap: 5px; }
.prop-lead-item { display: flex; align-items: center; gap: 5px; }
.prop-avatar {
  width: 16px; height: 16px;
  border-radius: 50%;
  display: flex; align-items: center;
  justify-content: center;
  font-size: 5px; font-weight: 700;
  flex-shrink: 0;
}
.prop-avatar.a { background: rgba(139,92,246,0.3); color: #c4b5fd; }
.prop-avatar.b { background: rgba(79,142,255,0.3); color: #93c5fd; }
.prop-lead-line { flex: 1; height: 2px; background: rgba(255,255,255,0.07); border-radius: 1px; }
.prop-lead-line.short { width: 60%; flex: none; }

/* FreshBox */
.freshbox-content { display: flex; align-items: center; gap: 16px; z-index: 2; position: relative; }
.fb-logo { font-size: 9px; font-weight: 800; color: #4ade80; }
.fb-logo span { color: #86efac; }
.fb-box { display: flex; gap: 4px; justify-content: center; font-size: 14px; }
.fb-timer { font-size: 7px; color: #4ade80; font-weight: 600; }
.fb-bar {
  width: 100%; height: 3px;
  background: rgba(255,255,255,0.06);
  border-radius: 2px; overflow: hidden;
  padding: 0 4px;
}
.fb-fill { width: 70%; height: 100%; background: #22c55e; border-radius: 2px; }
.fb-btn-g {
  background: #16a34a; color: #fff;
  font-size: 6px; font-weight: 700;
  border-radius: 4px; padding: 4px 0;
  text-align: center; width: 100%;
}

/* TeamPulse */
.teampulse-content { display: flex; align-items: center; gap: 16px; z-index: 2; position: relative; }
.tp-screen {
  width: 120px; height: 150px;
  background: #1c0e04;
  border-radius: 10px;
  border: 1px solid rgba(234,88,12,0.2);
  padding: 8px; flex-shrink: 0;
  display: flex; flex-direction: column; gap: 6px;
}
.tp-header { font-size: 8px; font-weight: 700; color: #fb923c; letter-spacing: 0.08em; }
.tp-chart { display: flex; align-items: flex-end; gap: 3px; height: 40px; padding: 0 2px; }
.tp-bar {
  flex: 1; background: rgba(234,88,12,0.2);
  border-radius: 2px 2px 0 0;
  transition: height 0.3s;
}
.tp-bar.accent { background: #ea580c; }
.tp-score { display: flex; align-items: baseline; gap: 4px; }
.tp-score-num { font-size: 18px; font-weight: 800; color: #fff; line-height: 1; }
.tp-score-num span { font-size: 10px; color: #fb923c; }
.tp-score-lbl { font-size: 7px; color: rgba(255,255,255,0.4); }
.tp-teams { display: flex; flex-direction: column; gap: 4px; }
.tp-team { display: flex; align-items: center; gap: 5px; }
.tp-av {
  width: 14px; height: 14px;
  border-radius: 50%; font-size: 5px;
  font-weight: 700; display: flex;
  align-items: center; justify-content: center;
  flex-shrink: 0;
}
.tp-av.o { background: rgba(234,88,12,0.3); color: #fb923c; }
.tp-av.b { background: rgba(79,142,255,0.3); color: #93c5fd; }
.tp-tl { flex: 1; height: 2px; background: rgba(255,255,255,0.07); border-radius: 1px; }
.tp-tl.short { width: 55%; flex: none; }

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
  .cargo-map { width: 90px; height: 80px; }
  .prop-screen { width: 95px; height: 120px; }
  .tp-screen { width: 95px; height: 120px; }
}
</style>
