<?php

namespace MessageBird\Wire\Model;

/**
 * WhatsApp's ban on this account, as WhatsApp announced it. Absent when there is no ban, and also when there is one WhatsApp announced before Bird began recording bans, or whose notification never reached Bird, since WhatsApp does not replay them. This is what WhatsApp announced rather than the account's current state, so it is never the field to read to decide whether an account can send.
 */
class WhatsAppBusinessAccountBanWrapper extends WhatsAppBusinessAccountBan
{
}
