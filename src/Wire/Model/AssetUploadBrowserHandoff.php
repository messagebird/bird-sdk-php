<?php

namespace MessageBird\Wire\Model;

class AssetUploadBrowserHandoff
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
     * The original upload session and any saved publication receipt. In this response, `session.next` is empty; follow the top-level `next` steps.
     *
     * @var AssetUploadBrowserHandoffSession|null
     */
    protected $session;
    /**
     * Bird page for a pending session, or null when it no longer accepts an upload. The link grants no access; the person must sign in and have asset write permission in the workspace.
     *
     * @var string|null
     */
    protected $browserUrl;
    /**
     * Ordered steps to finish the fallback or read its outcome.
     *
     * @var list<NextAction>|null
     */
    protected $next;
    /**
     * The original upload session and any saved publication receipt. In this response, `session.next` is empty; follow the top-level `next` steps.
     *
     * @return AssetUploadBrowserHandoffSession|null
     */
    public function getSession(): ?AssetUploadBrowserHandoffSession
    {
        return $this->session;
    }
    /**
     * The original upload session and any saved publication receipt. In this response, `session.next` is empty; follow the top-level `next` steps.
     *
     * @param AssetUploadBrowserHandoffSession|AssetUploadSessionDetails|array|null $session
     *
     * @return self
     */
    public function setSession($session): self
    {
        $this->initialized['session'] = true;
        $this->session = \MessageBird\Core\ModelWrapper::normalize($session, AssetUploadBrowserHandoffSession::class);
        return $this;
    }
    /**
     * Bird page for a pending session, or null when it no longer accepts an upload. The link grants no access; the person must sign in and have asset write permission in the workspace.
     *
     * @return string|null
     */
    public function getBrowserUrl(): ?string
    {
        return $this->browserUrl;
    }
    /**
     * Bird page for a pending session, or null when it no longer accepts an upload. The link grants no access; the person must sign in and have asset write permission in the workspace.
     *
     * @param string|null $browserUrl
     *
     * @return self
     */
    public function setBrowserUrl(?string $browserUrl): self
    {
        $this->initialized['browserUrl'] = true;
        $this->browserUrl = $browserUrl;
        return $this;
    }
    /**
     * Ordered steps to finish the fallback or read its outcome.
     *
     * @return list<NextAction>|null
     */
    public function getNext(): ?array
    {
        return $this->next;
    }
    /**
     * Ordered steps to finish the fallback or read its outcome.
     *
     * @param list<NextAction>|null $next
     *
     * @return self
     */
    public function setNext(?array $next): self
    {
        $this->initialized['next'] = true;
        $this->next = $next;
        return $this;
    }
}
