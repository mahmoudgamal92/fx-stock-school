<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Verify\V2\Service;

use Twilio\Options;
use Twilio\Values;

abstract class VerificationOptions {
    /**
     * @param string $customFriendlyName A custom user defined friendly name
     * @param string $customMessage The text of a custom message to use for the
     *                              verification
     * @param string $sendDigits The digits to send after a phone call is answered
     * @param string $locale The locale to use for the verification SMS or call
     * @param string $customCode A pre-generated code
     * @param string $amount The amount of the associated PSD2 compliant
     *                       transaction.
     * @param string $payee The payee of the associated PSD2 compliant transaction
     * @param array $rateLimits The custom key-value pairs of Programmable Rate
     *                          Limits.
     * @param array $channelConfiguration Channel specific configuration in json
     *                                    format.
     * @param string $appHash Your App Hash to be appended at the end of an SMS.
     * @param string $templateSid The SID of the custom template to be used.
     * @return CreateVerificationOptions Options builder
     */
    public static function create(string $customFriendlyName = Values::NONE, string $customMessage = Values::NONE, string $sendDigits = Values::NONE, string $locale = Values::NONE, string $customCode = Values::NONE, string $amount = Values::NONE, string $payee = Values::NONE, array $rateLimits = Values::ARRAY_NONE, array $channelConfiguration = Values::ARRAY_NONE, string $appHash = Values::NONE, string $templateSid = Values::NONE): CreateVerificationOptions {
        return new CreateVerificationOptions($customFriendlyName, $customMessage, $sendDigits, $locale, $customCode, $amount, $payee, $rateLimits, $channelConfiguration, $appHash, $templateSid);
    }
}

class CreateVerificationOptions extends Options {
    /**
     * @param string $customFriendlyName A custom user defined friendly name
     * @param string $customMessage The text of a custom message to use for the
     *                              verification
     * @param string $sendDigits The digits to send after a phone call is answered
     * @param string $locale The locale to use for the verification SMS or call
     * @param string $customCode A pre-generated code
     * @param string $amount The amount of the associated PSD2 compliant
     *                       transaction.
     * @param string $payee The payee of the associated PSD2 compliant transaction
     * @param array $rateLimits The custom key-value pairs of Programmable Rate
     *                          Limits.
     * @param array $channelConfiguration Channel specific configuration in json
     *                                    format.
     * @param string $appHash Your App Hash to be appended at the end of an SMS.
     * @param string $templateSid The SID of the custom template to be used.
     */
    public function __construct(string $customFriendlyName = Values::NONE, string $customMessage = Values::NONE, string $sendDigits = Values::NONE, string $locale = Values::NONE, string $customCode = Values::NONE, string $amount = Values::NONE, string $payee = Values::NONE, array $rateLimits = Values::ARRAY_NONE, array $channelConfiguration = Values::ARRAY_NONE, string $appHash = Values::NONE, string $templateSid = Values::NONE) {
        $this->options['customFriendlyName'] = $customFriendlyName;
        $this->options['customMessage'] = $customMessage;
        $this->options['sendDigits'] = $sendDigits;
        $this->options['locale'] = $locale;
        $this->options['customCode'] = $customCode;
        $this->options['amount'] = $amount;
        $this->options['payee'] = $payee;
        $this->options['rateLimits'] = $rateLimits;
        $this->options['channelConfiguration'] = $channelConfiguration;
        $this->options['appHash'] = $appHash;
        $this->options['templateSid'] = $templateSid;
    }

    /**
     * A custom user defined friendly name that overwrites the existing one in the verification message
     *
     * @param string $customFriendlyName A custom user defined friendly name
     * @return $this Fluent Builder
     */
    public function setCustomFriendlyName(string $customFriendlyName): self {
        $this->options['customFriendlyName'] = $customFriendlyName;
        return $this;
    }

    /**
     * The text of a custom message to use for the verification.
     *
     * @param string $customMessage The text of a custom message to use for the
     *                              verification
     * @return $this Fluent Builder
     */
    public function setCustomMessage(string $customMessage): self {
        $this->options['customMessage'] = $customMessage;
        return $this;
    }

    /**
     * The digits to send after a phone call is answered, for example, to dial an extension. For more information, see the Programmable Voice documentation of [sendDigits](https://www.twilio.com/docs/voice/twiml/number#attributes-sendDigits).
     *
     * @param string $sendDigits The digits to send after a phone call is answered
     * @return $this Fluent Builder
     */
    public function setSendDigits(string $sendDigits): self {
        $this->options['sendDigits'] = $sendDigits;
        return $this;
    }

    /**
     * The locale to use for the verification SMS or call. Can be: `af`, `ar`, `ca`, `cs`, `da`, `de`, `el`, `en`, `en-GB`, `es`, `fi`, `fr`, `he`, `hi`, `hr`, `hu`, `id`, `it`, `ja`, `ko`, `ms`, `nb`, `nl`, `pl`, `pt`, `pr-BR`, `ro`, `ru`, `sv`, `th`, `tl`, `tr`, `vi`, `zh`, `zh-CN`, or `zh-HK.`
     *
     * @param string $locale The locale to use for the verification SMS or call
     * @return $this Fluent Builder
     */
    public function setLocale(string $locale): self {
        $this->options['locale'] = $locale;
        return $this;
    }

    /**
     * A pre-generated code to use for verification. The code can be between 4 and 10 characters, inclusive.
     *
     * @param string $customCode A pre-generated code
     * @return $this Fluent Builder
     */
    public function setCustomCode(string $customCode): self {
        $this->options['customCode'] = $customCode;
        return $this;
    }

    /**
     * The amount of the associated PSD2 compliant transaction. Requires the PSD2 Service flag enabled.
     *
     * @param string $amount The amount of the associated PSD2 compliant
     *                       transaction.
     * @return $this Fluent Builder
     */
    public function setAmount(string $amount): self {
        $this->options['amount'] = $amount;
        return $this;
    }

    /**
     * The payee of the associated PSD2 compliant transaction. Requires the PSD2 Service flag enabled.
     *
     * @param string $payee The payee of the associated PSD2 compliant transaction
     * @return $this Fluent Builder
     */
    public function setPayee(string $payee): self {
        $this->options['payee'] = $payee;
        return $this;
    }

    /**
     * The custom key-value pairs of Programmable Rate Limits. Keys correspond to `unique_name` fields defined when [creating your Rate Limit](https://www.twilio.com/docs/verify/api/service-rate-limits). Associated value pairs represent values in the request that you are rate limiting on. You may include multiple Rate Limit values in each request.
     *
     * @param array $rateLimits The custom key-value pairs of Programmable Rate
     *                          Limits.
     * @return $this Fluent Builder
     */
    public function setRateLimits(array $rateLimits): self {
        $this->options['rateLimits'] = $rateLimits;
        return $this;
    }

    /**
     * [`email`](https://www.twilio.com/docs/verify/email) channel configuration in json format. Must include 'from' and 'from_name'.
     *
     * @param array $channelConfiguration Channel specific configuration in json
     *                                    format.
     * @return $this Fluent Builder
     */
    public function setChannelConfiguration(array $channelConfiguration): self {
        $this->options['channelConfiguration'] = $channelConfiguration;
        return $this;
    }

    /**
     * Your [App Hash](https://developers.google.com/identity/sms-retriever/verify#computing_your_apps_hash_string) to be appended at the end of your verification SMS body. Applies only to SMS. Example SMS body: `<#> Your AppName verification code is: 1234 He42w354ol9`.
     *
     * @param string $appHash Your App Hash to be appended at the end of an SMS.
     * @return $this Fluent Builder
     */
    public function setAppHash(string $appHash): self {
        $this->options['appHash'] = $appHash;
        return $this;
    }

    /**
     * The SID of the custom template to be used.
     *
     * @param string $templateSid The SID of the custom template to be used.
     * @return $this Fluent Builder
     */
    public function setTemplateSid(string $templateSid): self {
        $this->options['templateSid'] = $templateSid;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Verify.V2.CreateVerificationOptions ' . $options . ']';
    }
}