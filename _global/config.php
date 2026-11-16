<?php

// ─────────────────────────────────────────────────────────────────────────
// Firefly Nova2 — skin branding defaults.
// Edit these to rebrand the skin without touching any markup or CSS.
// The ship name itself comes from Nova (Sim Settings → sim name); everything
// below is the surrounding flavor text shown in the header, status strip,
// and footer. Values below match the "Ares" reference design out of the box.
// ─────────────────────────────────────────────────────────────────────────

// Header registry line, CJK subtitle, and tagline are editable (or removable
// — leave the content blank in Admin to hide the line) from Admin → Site
// Messages, under keys skin_registry_left / skin_registry_right /
// skin_subtitle / skin_tagline. The first page load seeds each key with the
// default below so it shows up there ready to edit. Not every template that
// includes this file loads the messages model (e.g. login), so fall back to
// the hardcoded default when it isn't available.
if (! function_exists('skin_editable_text')) {
    function skin_editable_text($msgs, $key, $default, $label)
    {
        if (! $msgs) {
            return $default;
        }

        $value = $msgs->get_message($key);

        if ($value === false) {
            $msgs->insert_new_message([
                'message_key' => $key,
                'message_label' => $label,
                'message_content' => $default,
                'message_type' => 'other',
            ]);

            return $default;
        }

        return $value;
    }
}

$msgs = isset($this->msgs) ? $this->msgs : null;

// Small CJK / accent word shown under the ship name.
$skin_subtitle = skin_editable_text($msgs, 'skin_subtitle', '战 神', 'Skin: Header Subtitle');

// Italic amber tagline under the ship name.
$skin_tagline = skin_editable_text($msgs, 'skin_tagline', 'Alliance built. Browncoat flown.', 'Skin: Header Tagline');

// Two-part registry line above the ship name (left label · right code).
$skin_registry_left  = skin_editable_text($msgs, 'skin_registry_left', 'Former Alliance · Now Independent', 'Skin: Header Registry Label');
$skin_registry_right = skin_editable_text($msgs, 'skin_registry_right', 'IBT-0012', 'Skin: Header Registry Code');

// Tactical data readout (top-left of header). One <div> per array entry.
$skin_readout = [
    'ID: APB-7741 → IBT-0012',
    'CLASS: UNION PATROL',
    'STATUS: RUNNING DARK',
    'IFF: SUPPRESSED',
];

// Status strip items (below the nav). First item gets the amber blink dot.
$skin_status_items = [
    'IFF: Suppressed',
    'Running Dark',
    'Comms: Encrypted Tight-beam',
    'Next Port: Beylix — 22 hrs',
];

// Faint CJK watermark inside the welcome panel, and the footer sign-off.
$skin_watermark    = '光 神';
$skin_footer_cjk   = '不能阻止信号 · Can\'t stop the signal.';

// Small kicker at the right of the Write Message page title.
$skin_msg_write_kicker = '新信息 · NEW TRANSMISSION';
