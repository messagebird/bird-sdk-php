<?php

namespace MessageBird\Wire\Model;

/**
 * The message an authentication request sends: the sign-in request bubble, the bubble that replaces it after sign-in, their images and an optional confirmation text. Only a template holds it. An authentication request renders the template and sends it. A message send does not accept it.
 */
class AMBTemplateVersionLanguageSignIn extends AMBSignInMessage
{
}
