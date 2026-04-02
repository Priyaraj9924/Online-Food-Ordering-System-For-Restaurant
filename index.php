<?php
// SpiceRoute Kitchen - Home Page
// Place this file in the root of your food_ordering/ directory
// It serves as the project landing page / portal entry point
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SpiceRoute Kitchen – Online Food Ordering System</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
/* ========== CSS VARIABLES ========== */
:root {
  --fire:    #FF4500;
  --fire2:   #FF6A2F;
  --gold:    #FFB347;
  --gold2:   #FFCB77;
  --teal:    #00BFA5;
  --teal2:   #4DD0C4;
  --dark:    #0A0A0A;
  --dark2:   #111111;
  --card:    #161616;
  --card2:   #1E1E1E;
  --border:  rgba(255,255,255,0.07);
  --border2: rgba(255,255,255,0.12);
  --text:    #F0F0F0;
  --muted:   #888888;
  --muted2:  #AAAAAA;
}

/* ========== RESET & BASE ========== */
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
html { scroll-behavior: smooth; }

body {
  font-family: 'DM Sans', sans-serif;
  background: var(--dark);
  color: var(--text);
  min-height: 100vh;
  overflow-x: hidden;
}

/* ========== SCROLLBAR ========== */
::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: var(--dark2); }
::-webkit-scrollbar-thumb { background: var(--fire); border-radius: 3px; }

/* ========== BACKGROUND CANVAS ========== */
.bg-canvas {
  position: fixed;
  inset: 0;
  pointer-events: none;
  z-index: 0;
  overflow: hidden;
}
.bg-blob {
  position: absolute;
  border-radius: 50%;
  filter: blur(80px);
  opacity: 0.18;
  animation: floatBlob 12s ease-in-out infinite alternate;
}
.bg-blob-1 {
  width: 700px; height: 700px;
  background: radial-gradient(circle, #FF4500, transparent);
  top: -200px; right: -150px;
  animation-delay: 0s;
}
.bg-blob-2 {
  width: 500px; height: 500px;
  background: radial-gradient(circle, #FFB347, transparent);
  bottom: -100px; left: -100px;
  animation-delay: -4s;
}
.bg-blob-3 {
  width: 400px; height: 400px;
  background: radial-gradient(circle, #00BFA5, transparent);
  top: 40%; right: 10%;
  opacity: 0.08;
  animation-delay: -8s;
}
.bg-grid {
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
  background-size: 60px 60px;
}
@keyframes floatBlob {
  0%   { transform: translate(0, 0) scale(1); }
  100% { transform: translate(30px, -40px) scale(1.1); }
}

/* ========== MAIN CONTENT ========== */
.page-wrapper {
  position: relative;
  z-index: 1;
}

/* ========== NAV ========== */
nav {
  position: sticky;
  top: 0;
  z-index: 100;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 48px;
  height: 70px;
  background: rgba(10,10,10,0.85);
  backdrop-filter: blur(20px);
  border-bottom: 1px solid var(--border);
}
.nav-brand {
  display: flex;
  align-items: center;
  gap: 12px;
  text-decoration: none;
}
.nav-icon {
  width: 38px; height: 38px;
  background: linear-gradient(135deg, var(--fire), var(--gold));
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 18px;
}
.nav-brand-name {
  font-family: 'Playfair Display', serif;
  font-size: 18px;
  font-weight: 700;
  color: var(--text);
  letter-spacing: 0.3px;
}
.nav-links {
  display: flex;
  align-items: center;
  gap: 8px;
}
.nav-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 14px;
  font-weight: 500;
  font-family: inherit;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.2s;
  border: 1px solid transparent;
}
.nav-btn-ghost {
  color: var(--muted2);
  border-color: var(--border2);
}
.nav-btn-ghost:hover {
  color: var(--text);
  border-color: var(--border2);
  background: rgba(255,255,255,0.05);
}
.nav-btn-fire {
  background: linear-gradient(135deg, var(--fire), var(--fire2));
  color: #fff;
}
.nav-btn-fire:hover {
  opacity: 0.9;
  transform: translateY(-1px);
  box-shadow: 0 6px 20px rgba(255,69,0,0.4);
}
.nav-btn-teal {
  background: linear-gradient(135deg, var(--teal), var(--teal2));
  color: #fff;
}
.nav-btn-teal:hover {
  opacity: 0.9;
  transform: translateY(-1px);
  box-shadow: 0 6px 20px rgba(0,191,165,0.4);
}

/* ========== HERO ========== */
.hero {
  min-height: calc(100vh - 70px);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 80px 48px;
  text-align: center;
  position: relative;
}
.hero-inner {
  max-width: 860px;
}
.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 6px 18px;
  border-radius: 30px;
  border: 1px solid rgba(255,179,71,0.3);
  background: rgba(255,179,71,0.07);
  color: var(--gold);
  font-size: 13px;
  font-weight: 600;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  margin-bottom: 28px;
  animation: fadeSlideDown 0.7s ease both;
}
.hero-badge .dot {
  width: 6px; height: 6px;
  background: var(--gold);
  border-radius: 50%;
  animation: pulse 2s infinite;
}
@keyframes pulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.5; transform: scale(1.4); }
}
.hero-title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(52px, 7vw, 96px);
  font-weight: 900;
  line-height: 1.0;
  letter-spacing: -2px;
  margin-bottom: 12px;
  animation: fadeSlideDown 0.7s 0.1s ease both;
}
.hero-title .word-spice { color: var(--fire); }
.hero-title .word-route { color: var(--gold); }
.hero-subtitle-line {
  font-family: 'Playfair Display', serif;
  font-style: italic;
  font-size: clamp(18px, 3vw, 28px);
  color: var(--muted2);
  margin-bottom: 32px;
  animation: fadeSlideDown 0.7s 0.2s ease both;
}
.hero-desc {
  font-size: 17px;
  color: var(--muted2);
  line-height: 1.7;
  max-width: 580px;
  margin: 0 auto 48px;
  animation: fadeSlideDown 0.7s 0.3s ease both;
}
.hero-ctas {
  display: flex;
  gap: 16px;
  justify-content: center;
  flex-wrap: wrap;
  animation: fadeSlideDown 0.7s 0.4s ease both;
}
.cta-btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 15px 30px;
  border-radius: 12px;
  font-size: 16px;
  font-weight: 600;
  font-family: inherit;
  text-decoration: none;
  transition: all 0.25s;
  letter-spacing: 0.2px;
}
.cta-fire {
  background: linear-gradient(135deg, var(--fire), var(--fire2));
  color: #fff;
  box-shadow: 0 8px 30px rgba(255,69,0,0.35);
}
.cta-fire:hover {
  transform: translateY(-2px);
  box-shadow: 0 14px 40px rgba(255,69,0,0.5);
}
.cta-teal {
  background: linear-gradient(135deg, var(--teal), var(--teal2));
  color: #fff;
  box-shadow: 0 8px 30px rgba(0,191,165,0.3);
}
.cta-teal:hover {
  transform: translateY(-2px);
  box-shadow: 0 14px 40px rgba(0,191,165,0.45);
}
.cta-ghost {
  background: rgba(255,255,255,0.05);
  border: 1px solid var(--border2);
  color: var(--muted2);
}
.cta-ghost:hover {
  background: rgba(255,255,255,0.09);
  color: var(--text);
  transform: translateY(-2px);
}
.hero-stats {
  display: flex;
  gap: 0;
  justify-content: center;
  margin-top: 64px;
  border-top: 1px solid var(--border);
  padding-top: 40px;
  animation: fadeSlideDown 0.7s 0.5s ease both;
}
.hero-stat {
  flex: 1;
  max-width: 180px;
  padding: 0 24px;
  border-right: 1px solid var(--border);
}
.hero-stat:last-child { border-right: none; }
.hero-stat-num {
  font-family: 'Playfair Display', serif;
  font-size: 36px;
  font-weight: 700;
  color: var(--text);
  line-height: 1;
}
.hero-stat-num span { color: var(--fire); }
.hero-stat-label { font-size: 13px; color: var(--muted); margin-top: 6px; }

@keyframes fadeSlideDown {
  from { opacity: 0; transform: translateY(-20px); }
  to   { opacity: 1; transform: translateY(0); }
}

/* ========== SECTION COMMON ========== */
section {
  padding: 100px 48px;
  max-width: 1280px;
  margin: 0 auto;
}
.section-label {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--fire);
  margin-bottom: 16px;
}
.section-label::before {
  content: '';
  width: 24px; height: 2px;
  background: var(--fire);
  border-radius: 1px;
}
.section-title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(32px, 4vw, 50px);
  font-weight: 700;
  color: var(--text);
  line-height: 1.15;
  letter-spacing: -1px;
  margin-bottom: 16px;
}
.section-desc {
  font-size: 16px;
  color: var(--muted2);
  line-height: 1.7;
  max-width: 520px;
}

/* ========== PANEL CARDS ========== */
.panels-section {
  padding-top: 0;
}
.panels-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 24px;
  margin-top: 48px;
}
.panel-card {
  position: relative;
  border-radius: 20px;
  border: 1px solid var(--border);
  padding: 40px;
  overflow: hidden;
  transition: transform 0.3s, box-shadow 0.3s;
  background: var(--card);
}
.panel-card::before {
  content: '';
  position: absolute;
  inset: 0;
  opacity: 0;
  transition: opacity 0.3s;
}
.panel-card-admin::before {
  background: radial-gradient(ellipse at top right, rgba(255,69,0,0.12), transparent 60%);
}
.panel-card-staff::before {
  background: radial-gradient(ellipse at top right, rgba(0,191,165,0.1), transparent 60%);
}
.panel-card:hover { transform: translateY(-4px); }
.panel-card-admin:hover { box-shadow: 0 24px 60px rgba(255,69,0,0.18); }
.panel-card-staff:hover { box-shadow: 0 24px 60px rgba(0,191,165,0.14); }
.panel-card:hover::before { opacity: 1; }
.panel-top {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  margin-bottom: 28px;
}
.panel-icon {
  width: 56px; height: 56px;
  border-radius: 14px;
  display: flex; align-items: center; justify-content: center;
  font-size: 24px;
}
.admin-icon { background: linear-gradient(135deg, rgba(255,69,0,0.2), rgba(255,106,47,0.2)); border: 1px solid rgba(255,69,0,0.3); }
.staff-icon { background: linear-gradient(135deg, rgba(0,191,165,0.2), rgba(77,208,196,0.2)); border: 1px solid rgba(0,191,165,0.3); }
.panel-badge {
  padding: 5px 14px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 1px;
  text-transform: uppercase;
}
.admin-badge { background: rgba(255,69,0,0.1); color: var(--fire); border: 1px solid rgba(255,69,0,0.25); }
.staff-badge { background: rgba(0,191,165,0.1); color: var(--teal); border: 1px solid rgba(0,191,165,0.25); }
.panel-title {
  font-family: 'Playfair Display', serif;
  font-size: 26px;
  font-weight: 700;
  color: var(--text);
  margin-bottom: 8px;
}
.panel-desc {
  font-size: 15px;
  color: var(--muted2);
  line-height: 1.65;
  margin-bottom: 28px;
}
.panel-features {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-bottom: 32px;
}
.panel-features li {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 14px;
  color: var(--muted2);
}
.panel-features li i {
  width: 18px;
  font-size: 13px;
}
.admin-check { color: var(--fire); }
.staff-check { color: var(--teal); }
.panel-link {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 13px 24px;
  border-radius: 10px;
  font-size: 15px;
  font-weight: 600;
  font-family: inherit;
  text-decoration: none;
  transition: all 0.2s;
}
.admin-link {
  background: linear-gradient(135deg, var(--fire), var(--fire2));
  color: #fff;
}
.admin-link:hover {
  box-shadow: 0 8px 24px rgba(255,69,0,0.45);
  transform: translateY(-1px);
}
.staff-link-btn {
  background: linear-gradient(135deg, var(--teal), var(--teal2));
  color: #fff;
}
.staff-link-btn:hover {
  box-shadow: 0 8px 24px rgba(0,191,165,0.4);
  transform: translateY(-1px);
}
.panel-decor {
  position: absolute;
  font-size: 120px;
  bottom: -20px; right: -10px;
  opacity: 0.04;
  pointer-events: none;
  line-height: 1;
}

/* ========== FEATURES SECTION ========== */
.features-header {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 48px;
  align-items: end;
  margin-bottom: 64px;
}
.features-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}
.feature-card {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 16px;
  padding: 28px;
  transition: all 0.3s;
  position: relative;
  overflow: hidden;
}
.feature-card::after {
  content: '';
  position: absolute;
  bottom: 0; left: 0; right: 0;
  height: 2px;
  background: linear-gradient(90deg, var(--fire), var(--gold));
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.3s;
}
.feature-card:hover { border-color: var(--border2); transform: translateY(-2px); }
.feature-card:hover::after { transform: scaleX(1); }
.feat-icon {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: rgba(255,69,0,0.1);
  border: 1px solid rgba(255,69,0,0.2);
  display: flex; align-items: center; justify-content: center;
  font-size: 18px;
  margin-bottom: 16px;
}
.feat-title {
  font-size: 15px;
  font-weight: 600;
  color: var(--text);
  margin-bottom: 8px;
}
.feat-desc {
  font-size: 13px;
  color: var(--muted);
  line-height: 1.6;
}

/* ========== TECH STACK ========== */
.tech-section {
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
  background: var(--dark2);
  max-width: 100%;
  padding: 60px 48px;
}
.tech-inner {
  max-width: 1280px;
  margin: 0 auto;
}
.tech-title {
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 2.5px;
  text-transform: uppercase;
  color: var(--muted);
  text-align: center;
  margin-bottom: 36px;
}
.tech-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  justify-content: center;
}
.tech-pill {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 10px 20px;
  border-radius: 40px;
  border: 1px solid var(--border2);
  background: var(--card);
  font-size: 14px;
  font-weight: 500;
  color: var(--muted2);
  transition: all 0.2s;
}
.tech-pill:hover {
  border-color: rgba(255,69,0,0.4);
  color: var(--text);
  transform: translateY(-1px);
}
.tech-pill i { font-size: 15px; }

/* ========== DB TABLES ========== */
.tables-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 16px;
  margin-top: 48px;
}
.table-card {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 22px 24px;
  transition: all 0.25s;
}
.table-card:hover {
  border-color: rgba(255,179,71,0.3);
  background: var(--card2);
  transform: translateY(-2px);
}
.table-icon {
  font-size: 20px;
  margin-bottom: 12px;
}
.table-name {
  font-family: 'DM Sans', monospace;
  font-size: 13px;
  font-weight: 700;
  color: var(--gold);
  margin-bottom: 4px;
  letter-spacing: 0.5px;
}
.table-desc { font-size: 12px; color: var(--muted); }

/* ========== QUICK START ========== */
.setup-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  margin-top: 48px;
  counter-reset: steps;
}
.setup-step {
  position: relative;
  padding: 28px;
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 16px;
  transition: all 0.25s;
}
.setup-step:hover { border-color: var(--border2); transform: translateY(-2px); }
.setup-step::before {
  counter-increment: steps;
  content: counter(steps);
  position: absolute;
  top: -1px; left: -1px;
  width: 32px; height: 32px;
  background: linear-gradient(135deg, var(--fire), var(--gold));
  border-radius: 14px 0 10px 0;
  display: flex; align-items: center; justify-content: center;
  font-size: 13px;
  font-weight: 700;
  color: #fff;
}
.step-title {
  font-size: 15px;
  font-weight: 600;
  color: var(--text);
  margin-bottom: 8px;
  margin-top: 8px;
}
.step-desc { font-size: 13px; color: var(--muted); line-height: 1.6; }
.step-code {
  display: block;
  margin-top: 10px;
  font-family: 'Courier New', monospace;
  font-size: 11px;
  padding: 8px 10px;
  background: rgba(0,0,0,0.4);
  border: 1px solid var(--border);
  border-radius: 6px;
  color: var(--gold);
  word-break: break-all;
}

/* ========== CREDENTIALS ========== */
.creds-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 24px;
  margin-top: 40px;
}
.cred-card {
  padding: 32px;
  border-radius: 16px;
  border: 1px solid var(--border);
  background: var(--card);
  position: relative;
  overflow: hidden;
}
.cred-card-admin { border-color: rgba(255,69,0,0.2); }
.cred-card-staff { border-color: rgba(0,191,165,0.2); }
.cred-title {
  display: flex; align-items: center; gap: 10px;
  font-size: 16px; font-weight: 700;
  color: var(--text);
  margin-bottom: 20px;
}
.cred-title i { font-size: 16px; }
.cred-admin-title i { color: var(--fire); }
.cred-staff-title i { color: var(--teal); }
.cred-row {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 10px 0;
  border-bottom: 1px solid var(--border);
}
.cred-row:last-child { border-bottom: none; }
.cred-label { font-size: 12px; color: var(--muted); min-width: 70px; }
.cred-value {
  font-size: 14px;
  font-weight: 600;
  color: var(--text);
  font-family: 'Courier New', monospace;
  background: rgba(255,255,255,0.05);
  padding: 4px 10px;
  border-radius: 5px;
  letter-spacing: 0.3px;
}
.cred-card-admin .cred-value { color: #FFA07A; }
.cred-card-staff .cred-value { color: var(--teal2); }
.cred-link {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  margin-top: 20px;
  font-size: 13px;
  font-weight: 600;
  text-decoration: none;
  padding: 8px 16px;
  border-radius: 8px;
  transition: all 0.2s;
}
.admin-cred-link {
  background: rgba(255,69,0,0.1);
  color: var(--fire);
  border: 1px solid rgba(255,69,0,0.25);
}
.admin-cred-link:hover { background: rgba(255,69,0,0.2); }
.staff-cred-link {
  background: rgba(0,191,165,0.1);
  color: var(--teal);
  border: 1px solid rgba(0,191,165,0.25);
}
.staff-cred-link:hover { background: rgba(0,191,165,0.2); }

/* ========== FOOTER ========== */
footer {
  max-width: 100%;
  border-top: 1px solid var(--border);
  background: var(--dark2);
  padding: 48px;
  text-align: center;
}
.footer-inner { max-width: 1280px; margin: 0 auto; }
.footer-brand {
  display: flex;
  align-items: center;
  gap: 12px;
  justify-content: center;
  margin-bottom: 20px;
}
.footer-name {
  font-family: 'Playfair Display', serif;
  font-size: 20px;
  font-weight: 700;
  color: var(--text);
}
.footer-tagline {
  font-size: 14px;
  color: var(--muted);
  margin-bottom: 24px;
}
.footer-divider {
  width: 60px; height: 1px;
  background: linear-gradient(90deg, transparent, var(--fire), transparent);
  margin: 24px auto;
}
.footer-meta {
  font-size: 13px;
  color: var(--muted);
}
.footer-meta span { color: var(--fire); }

/* ========== SCROLL REVEAL ========== */
.reveal {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.65s ease, transform 0.65s ease;
}
.reveal.visible {
  opacity: 1;
  transform: translateY(0);
}
.reveal-d1 { transition-delay: 0.05s; }
.reveal-d2 { transition-delay: 0.12s; }
.reveal-d3 { transition-delay: 0.19s; }
.reveal-d4 { transition-delay: 0.26s; }

/* ========== RESPONSIVE ========== */
@media (max-width: 960px) {
  nav { padding: 0 24px; }
  .panels-grid, .features-grid, .creds-grid { grid-template-columns: 1fr; }
  .tables-grid, .setup-steps { grid-template-columns: repeat(2, 1fr); }
  .features-header { grid-template-columns: 1fr; gap: 24px; }
  section { padding: 60px 24px; }
  .hero { padding: 60px 24px; }
  .hero-stats { gap: 0; flex-wrap: wrap; }
}
@media (max-width: 600px) {
  nav { padding: 0 16px; }
  .nav-links .nav-btn-ghost { display: none; }
  .tables-grid, .setup-steps { grid-template-columns: 1fr; }
  .hero-stats { flex-direction: column; align-items: center; gap: 20px; }
  .hero-stat { border-right: none; border-bottom: 1px solid var(--border); padding-bottom: 20px; width: 100%; }
  .hero-stat:last-child { border-bottom: none; }
}
</style>
</head>
<body>

<!-- Background -->
<div class="bg-canvas" aria-hidden="true">
  <div class="bg-grid"></div>
  <div class="bg-blob bg-blob-1"></div>
  <div class="bg-blob bg-blob-2"></div>
  <div class="bg-blob bg-blob-3"></div>
</div>

<div class="page-wrapper">

  <!-- ===== NAVIGATION ===== -->
  <nav>
    <a href="#" class="nav-brand">
      <div class="nav-icon">🍛</div>
      <span class="nav-brand-name">SpiceRoute Kitchen</span>
    </a>
    <div class="nav-links">
      <a href="#features" class="nav-btn nav-btn-ghost">Features</a>
      <a href="#setup"    class="nav-btn nav-btn-ghost">Setup</a>
      <a href="admin/login.php" class="nav-btn nav-btn-fire">
        <i class="fas fa-shield-halved"></i> Admin
      </a>
      <a href="staff/login.php" class="nav-btn nav-btn-teal">
        <i class="fas fa-user-tie"></i> Staff
      </a>
    </div>
  </nav>

  <!-- ===== HERO ===== -->
  <div class="hero">
    <div class="hero-inner">
      <div class="hero-badge">
        <span class="dot"></span>
        Online Food Ordering System
      </div>

      <h1 class="hero-title">
        <span class="word-spice">Spice</span><span class="word-route">Route</span><br>Kitchen
      </h1>
      <p class="hero-subtitle-line">Flavour meets technology</p>
      <p class="hero-desc">
        A complete restaurant management solution built for 
        Manage orders, menus, staff, coupons, customers and real-time reports —
        all from one elegant.
      </p>

      <div class="hero-ctas">
        <a href="book-demo/login.php" class="cta-btn cta-teal">
          <i class="fas fa-handshake"></i> Book A Demo
        </a>
        <a href="admin/login.php" class="cta-btn cta-fire">
          <i class="fas fa-book"></i> Setup Guide
        </a>
      </div>

      <div class="hero-stats">
        <div class="hero-stat">
          <div class="hero-stat-num">3<span>+</span></div>
          <div class="hero-stat-label">Months of Experience</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-num">57<span>+</span></div>
          <div class="hero-stat-label">Restaurants Use</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-num">168<span>+</span></div>
          <div class="hero-stat-label">Staff Members</div>
        </div>
      </div>
    </div>
  </div>

  <!-- ===== FEATURES SECTION ===== -->
  <section id="features">
    <div class="features-header">
      <div>
        <div class="section-label">Capabilities</div>
        <h2 class="section-title">Everything a restaurant needs</h2>
      </div>
      <p class="section-desc">
        From order intake to delivery, SpiceRoute Kitchen covers the entire
        restaurant workflow with a clean & fast.
      </p>
    </div>

    <div class="features-grid">
      <?php
      $features = [
        ['🧾', 'Order Management',     'Filter, search, and inline-update order statuses. Full order detail view with notes and staff assignment.'],
        ['📊', 'Live Dashboard',        'Real-time stats, weekly revenue bar chart via Chart.js, top-selling items, and recent order feed.'],
        ['👥', 'Staff Management',      'Add, edit, deactivate staff accounts. Track individual delivery counts and active order loads.'],
        ['📈', 'Revenue Reports',       'Date-range revenue analysis, daily trend chart, payment type breakdown, top menu items report.'],
        ['🖨️', 'Print Receipts',        'Auto-print thermal-style receipts for any order directly from the detail or order list page.'],
        ['🔒', 'Secure Auth',           'Session-based login with role checks. Passwords hashed via password_hash(). SQL injection safe.'],
      ];
      foreach ($features as $i => [$icon, $title, $desc]):
        $delay = 'd' . (($i % 3) + 1);
      ?>
      <div class="feature-card reveal <?= $delay ?>">
        <div class="feat-icon"><?= $icon ?></div>
        <div class="feat-title"><?= htmlspecialchars($title) ?></div>
        <div class="feat-desc"><?= htmlspecialchars($desc) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>


  <!-- ===== FOOTER ===== -->
  <footer>
    <div class="footer-inner">
      <div class="footer-brand">
        <div class="nav-icon">🍛</div>
        <span class="footer-name">SpiceRoute Kitchen</span>
      </div>
      <p class="footer-tagline">© 2026 Online Food Ordering &amp; Restaurant Management System</p>
      <div class="footer-divider"></div>
      
    </div>
  </footer>

</div><!-- /page-wrapper -->

<script>

// Scroll reveal
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    }
  });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    const target = document.querySelector(a.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});
</script>
</body>
</html>
