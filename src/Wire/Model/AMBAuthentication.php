<?php

namespace MessageBird\Wire\Model;

/**
 * A single attempt to verify the identity associated with an Apple Messages for Business conversation.
 */
class AMBAuthentication
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $conversationId;
    /**
     * @var string|null
     */
    protected $providerId;
    /**
     * Provider revision used by this attempt.
     *
     * @var int|null
     */
    protected $providerRevision;
    /**
     * Authentication message reference, or null before acceptance.
     *
     * @var string|null
     */
    protected $messageId;
    /**
     * Progress of an authentication request. Every value except `pending` and `processing` is terminal.
     * 
     * - `pending`: the sign-in message was accepted and the customer has not finished.
     * - `processing`: the authorization code is being exchanged or Bird is waiting for confirmation from the originating Messages device.
     * - `succeeded`: the identity was validated and the originating Messages device confirmed sign-in.
     * - `failed`: delivery, identity verification or device confirmation failed, or the provider callback was replayed.
     * - `cancelled`: the customer or the provider declined authorization.
     * - `expired`: the request passed its ten-minute lifetime.
     * - `superseded`: a newer request, or a change to the conversation, business or provider, replaced the request.
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * When the attempt was created.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * When this attempt expires.
     *
     * @var \DateTime|null
     */
    protected $expiresAt;
    /**
     * When the attempt reached a terminal outcome.
     *
     * @var \DateTime|null
     */
    protected $completedAt;
    /**
     * Why the request did not succeed. Contains no provider response or credentials.
     * 
     * - `authentication_expired`: ten minutes passed. Request a new sign-in.
     * - `new_authentication`: a newer request replaced this one.
     * - `conversation_closed` and `conversation_changed`: the conversation closed or reopened. Wait for the customer to write again.
     * - `configuration_changed`: the provider settings changed or the business was disconnected.
     * - `user_cancelled`, `apple_authentication_cancel`: the customer declined.
     * - `provider_rejected`, `token_exchange_failed`, `identity_verification_failed`: the provider response could not be accepted. Check the provider settings, then request a new sign-in.
     * - `processing_interrupted`: the exchange or device confirmation did not finish within one minute. Ask the customer to sign in again and return to Messages.
     * - `apple_authentication_failure`: the Messages device reported a failed sign-in. Request a new sign-in.
     * - `authentication_replayed`: the provider callback was used more than once. Request a new sign-in.
     * - `message_submission_failed`, `message_failed`: the sign-in message could not be sent.
     * 
     * Other values are message delivery reasons passed through unchanged.
     * 
     *
     * @var string|null
     */
    protected $failureCode;
    /**
     * Validated identity claims. Verification does not create a persistent login session or grant access to customer systems.
     *
     * @var AMBVerifiedIdentity|null
     */
    protected $identity;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getConversationId(): ?string
    {
        return $this->conversationId;
    }
    /**
     * @param string|null $conversationId
     *
     * @return self
     */
    public function setConversationId(?string $conversationId): self
    {
        $this->initialized['conversationId'] = true;
        $this->conversationId = $conversationId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getProviderId(): ?string
    {
        return $this->providerId;
    }
    /**
     * @param string|null $providerId
     *
     * @return self
     */
    public function setProviderId(?string $providerId): self
    {
        $this->initialized['providerId'] = true;
        $this->providerId = $providerId;
        return $this;
    }
    /**
     * Provider revision used by this attempt.
     *
     * @return int|null
     */
    public function getProviderRevision(): ?int
    {
        return $this->providerRevision;
    }
    /**
     * Provider revision used by this attempt.
     *
     * @param int|null $providerRevision
     *
     * @return self
     */
    public function setProviderRevision(?int $providerRevision): self
    {
        $this->initialized['providerRevision'] = true;
        $this->providerRevision = $providerRevision;
        return $this;
    }
    /**
     * Authentication message reference, or null before acceptance.
     *
     * @return string|null
     */
    public function getMessageId(): ?string
    {
        return $this->messageId;
    }
    /**
     * Authentication message reference, or null before acceptance.
     *
     * @param string|null $messageId
     *
     * @return self
     */
    public function setMessageId(?string $messageId): self
    {
        $this->initialized['messageId'] = true;
        $this->messageId = $messageId;
        return $this;
    }
    /**
     * Progress of an authentication request. Every value except `pending` and `processing` is terminal.
     * 
     * - `pending`: the sign-in message was accepted and the customer has not finished.
     * - `processing`: the authorization code is being exchanged or Bird is waiting for confirmation from the originating Messages device.
     * - `succeeded`: the identity was validated and the originating Messages device confirmed sign-in.
     * - `failed`: delivery, identity verification or device confirmation failed, or the provider callback was replayed.
     * - `cancelled`: the customer or the provider declined authorization.
     * - `expired`: the request passed its ten-minute lifetime.
     * - `superseded`: a newer request, or a change to the conversation, business or provider, replaced the request.
     * 
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
    * Progress of an authentication request. Every value except `pending` and `processing` is terminal.
    
    - `pending`: the sign-in message was accepted and the customer has not finished.
    - `processing`: the authorization code is being exchanged or Bird is waiting for confirmation from the originating Messages device.
    - `succeeded`: the identity was validated and the originating Messages device confirmed sign-in.
    - `failed`: delivery, identity verification or device confirmation failed, or the provider callback was replayed.
    - `cancelled`: the customer or the provider declined authorization.
    - `expired`: the request passed its ten-minute lifetime.
    - `superseded`: a newer request, or a change to the conversation, business or provider, replaced the request.
    
    *
    * @param string|null $status
    *
    * @return self
    */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * When the attempt was created.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }
    /**
     * When the attempt was created.
     *
     * @param \DateTime|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * When this attempt expires.
     *
     * @return \DateTime|null
     */
    public function getExpiresAt(): ?\DateTime
    {
        return $this->expiresAt;
    }
    /**
     * When this attempt expires.
     *
     * @param \DateTime|null $expiresAt
     *
     * @return self
     */
    public function setExpiresAt(?\DateTime $expiresAt): self
    {
        $this->initialized['expiresAt'] = true;
        $this->expiresAt = $expiresAt;
        return $this;
    }
    /**
     * When the attempt reached a terminal outcome.
     *
     * @return \DateTime|null
     */
    public function getCompletedAt(): ?\DateTime
    {
        return $this->completedAt;
    }
    /**
     * When the attempt reached a terminal outcome.
     *
     * @param \DateTime|null $completedAt
     *
     * @return self
     */
    public function setCompletedAt(?\DateTime $completedAt): self
    {
        $this->initialized['completedAt'] = true;
        $this->completedAt = $completedAt;
        return $this;
    }
    /**
     * Why the request did not succeed. Contains no provider response or credentials.
     * 
     * - `authentication_expired`: ten minutes passed. Request a new sign-in.
     * - `new_authentication`: a newer request replaced this one.
     * - `conversation_closed` and `conversation_changed`: the conversation closed or reopened. Wait for the customer to write again.
     * - `configuration_changed`: the provider settings changed or the business was disconnected.
     * - `user_cancelled`, `apple_authentication_cancel`: the customer declined.
     * - `provider_rejected`, `token_exchange_failed`, `identity_verification_failed`: the provider response could not be accepted. Check the provider settings, then request a new sign-in.
     * - `processing_interrupted`: the exchange or device confirmation did not finish within one minute. Ask the customer to sign in again and return to Messages.
     * - `apple_authentication_failure`: the Messages device reported a failed sign-in. Request a new sign-in.
     * - `authentication_replayed`: the provider callback was used more than once. Request a new sign-in.
     * - `message_submission_failed`, `message_failed`: the sign-in message could not be sent.
     * 
     * Other values are message delivery reasons passed through unchanged.
     * 
     *
     * @return string|null
     */
    public function getFailureCode(): ?string
    {
        return $this->failureCode;
    }
    /**
    * Why the request did not succeed. Contains no provider response or credentials.
    
    - `authentication_expired`: ten minutes passed. Request a new sign-in.
    - `new_authentication`: a newer request replaced this one.
    - `conversation_closed` and `conversation_changed`: the conversation closed or reopened. Wait for the customer to write again.
    - `configuration_changed`: the provider settings changed or the business was disconnected.
    - `user_cancelled`, `apple_authentication_cancel`: the customer declined.
    - `provider_rejected`, `token_exchange_failed`, `identity_verification_failed`: the provider response could not be accepted. Check the provider settings, then request a new sign-in.
    - `processing_interrupted`: the exchange or device confirmation did not finish within one minute. Ask the customer to sign in again and return to Messages.
    - `apple_authentication_failure`: the Messages device reported a failed sign-in. Request a new sign-in.
    - `authentication_replayed`: the provider callback was used more than once. Request a new sign-in.
    - `message_submission_failed`, `message_failed`: the sign-in message could not be sent.
    
    Other values are message delivery reasons passed through unchanged.
    
    *
    * @param string|null $failureCode
    *
    * @return self
    */
    public function setFailureCode(?string $failureCode): self
    {
        $this->initialized['failureCode'] = true;
        $this->failureCode = $failureCode;
        return $this;
    }
    /**
     * Validated identity claims. Verification does not create a persistent login session or grant access to customer systems.
     *
     * @return AMBVerifiedIdentity|null
     */
    public function getIdentity(): ?AMBVerifiedIdentity
    {
        return $this->identity;
    }
    /**
     * Validated identity claims. Verification does not create a persistent login session or grant access to customer systems.
     *
     * @param AMBVerifiedIdentity|null $identity
     *
     * @return self
     */
    public function setIdentity(?AMBVerifiedIdentity $identity): self
    {
        $this->initialized['identity'] = true;
        $this->identity = $identity;
        return $this;
    }
}
