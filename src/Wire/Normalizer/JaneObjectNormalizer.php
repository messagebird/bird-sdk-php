<?php

namespace MessageBird\Wire\Normalizer;

use MessageBird\Wire\Runtime\Normalizer\CheckArray;
use MessageBird\Wire\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    protected $normalizers = [
        
        \MessageBird\Wire\Model\ErrorDetail::class => \MessageBird\Wire\Normalizer\ErrorDetailNormalizer::class,
        
        \MessageBird\Wire\Model\NextAction::class => \MessageBird\Wire\Normalizer\NextActionNormalizer::class,
        
        \MessageBird\Wire\Model\ErrorBody::class => \MessageBird\Wire\Normalizer\ErrorBodyNormalizer::class,
        
        \MessageBird\Wire\Model\Error::class => \MessageBird\Wire\Normalizer\ErrorNormalizer::class,
        
        \MessageBird\Wire\Model\RealtimePublish::class => \MessageBird\Wire\Normalizer\RealtimePublishNormalizer::class,
        
        \MessageBird\Wire\Model\RealtimeChannelListItem::class => \MessageBird\Wire\Normalizer\RealtimeChannelListItemNormalizer::class,
        
        \MessageBird\Wire\Model\RealtimePublishResult::class => \MessageBird\Wire\Normalizer\RealtimePublishResultNormalizer::class,
        
        \MessageBird\Wire\Model\RealtimeBatchEvent::class => \MessageBird\Wire\Normalizer\RealtimeBatchEventNormalizer::class,
        
        \MessageBird\Wire\Model\RealtimeBatchPublish::class => \MessageBird\Wire\Normalizer\RealtimeBatchPublishNormalizer::class,
        
        \MessageBird\Wire\Model\RealtimeBatchPublishResultItem::class => \MessageBird\Wire\Normalizer\RealtimeBatchPublishResultItemNormalizer::class,
        
        \MessageBird\Wire\Model\RealtimeBatchPublishResult::class => \MessageBird\Wire\Normalizer\RealtimeBatchPublishResultNormalizer::class,
        
        \MessageBird\Wire\Model\RealtimeChannelsList::class => \MessageBird\Wire\Normalizer\RealtimeChannelsListNormalizer::class,
        
        \MessageBird\Wire\Model\RealtimeChannelInfo::class => \MessageBird\Wire\Normalizer\RealtimeChannelInfoNormalizer::class,
        
        \MessageBird\Wire\Model\RealtimeChannelMember::class => \MessageBird\Wire\Normalizer\RealtimeChannelMemberNormalizer::class,
        
        \MessageBird\Wire\Model\RealtimeChannelMembers::class => \MessageBird\Wire\Normalizer\RealtimeChannelMembersNormalizer::class,
        
        \MessageBird\Wire\Model\RealtimeMemberPublish::class => \MessageBird\Wire\Normalizer\RealtimeMemberPublishNormalizer::class,
        
        \MessageBird\Wire\Model\EmailAddress::class => \MessageBird\Wire\Normalizer\EmailAddressNormalizer::class,
        
        \MessageBird\Wire\Model\Tag::class => \MessageBird\Wire\Normalizer\TagNormalizer::class,
        
        \MessageBird\Wire\Model\EmailAttachmentRef::class => \MessageBird\Wire\Normalizer\EmailAttachmentRefNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMessage::class => \MessageBird\Wire\Normalizer\EmailMessageNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMessageList::class => \MessageBird\Wire\Normalizer\EmailMessageListNormalizer::class,
        
        \MessageBird\Wire\Model\EmailAttachment::class => \MessageBird\Wire\Normalizer\EmailAttachmentNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMessageSendRequest::class => \MessageBird\Wire\Normalizer\EmailMessageSendRequestNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMessageSendRequestTemplate::class => \MessageBird\Wire\Normalizer\EmailMessageSendRequestTemplateNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMessageBatchItem::class => \MessageBird\Wire\Normalizer\EmailMessageBatchItemNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMessageBatchResponse::class => \MessageBird\Wire\Normalizer\EmailMessageBatchResponseNormalizer::class,
        
        \MessageBird\Wire\Model\EmailRecipient::class => \MessageBird\Wire\Normalizer\EmailRecipientNormalizer::class,
        
        \MessageBird\Wire\Model\EmailRecipientList::class => \MessageBird\Wire\Normalizer\EmailRecipientListNormalizer::class,
        
        \MessageBird\Wire\Model\EmailEvent::class => \MessageBird\Wire\Normalizer\EmailEventNormalizer::class,
        
        \MessageBird\Wire\Model\EmailEventList::class => \MessageBird\Wire\Normalizer\EmailEventListNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMessageContent::class => \MessageBird\Wire\Normalizer\EmailMessageContentNormalizer::class,
        
        \MessageBird\Wire\Model\AudienceRef::class => \MessageBird\Wire\Normalizer\AudienceRefNormalizer::class,
        
        \MessageBird\Wire\Model\Contact::class => \MessageBird\Wire\Normalizer\ContactNormalizer::class,
        
        \MessageBird\Wire\Model\ContactList::class => \MessageBird\Wire\Normalizer\ContactListNormalizer::class,
        
        \MessageBird\Wire\Model\ContactCreateRequest::class => \MessageBird\Wire\Normalizer\ContactCreateRequestNormalizer::class,
        
        \MessageBird\Wire\Model\ContactUpsertRequest::class => \MessageBird\Wire\Normalizer\ContactUpsertRequestNormalizer::class,
        
        \MessageBird\Wire\Model\ContactUpsertEntry::class => \MessageBird\Wire\Normalizer\ContactUpsertEntryNormalizer::class,
        
        \MessageBird\Wire\Model\ContactUpsertError::class => \MessageBird\Wire\Normalizer\ContactUpsertErrorNormalizer::class,
        
        \MessageBird\Wire\Model\ContactUpsertResultItem::class => \MessageBird\Wire\Normalizer\ContactUpsertResultItemNormalizer::class,
        
        \MessageBird\Wire\Model\ContactUpsertResult::class => \MessageBird\Wire\Normalizer\ContactUpsertResultNormalizer::class,
        
        \MessageBird\Wire\Model\ContactUpdateRequest::class => \MessageBird\Wire\Normalizer\ContactUpdateRequestNormalizer::class,
        
        \MessageBird\Wire\Model\Audience::class => \MessageBird\Wire\Normalizer\AudienceNormalizer::class,
        
        \MessageBird\Wire\Model\AudienceList::class => \MessageBird\Wire\Normalizer\AudienceListNormalizer::class,
        
        \MessageBird\Wire\Model\Preference::class => \MessageBird\Wire\Normalizer\PreferenceNormalizer::class,
        
        \MessageBird\Wire\Model\PreferenceList::class => \MessageBird\Wire\Normalizer\PreferenceListNormalizer::class,
        
        \MessageBird\Wire\Model\PreferenceCreate::class => \MessageBird\Wire\Normalizer\PreferenceCreateNormalizer::class,
        
        \MessageBird\Wire\Model\PreferenceWriteResult::class => \MessageBird\Wire\Normalizer\PreferenceWriteResultNormalizer::class,
        
        \MessageBird\Wire\Model\ContactProperty::class => \MessageBird\Wire\Normalizer\ContactPropertyNormalizer::class,
        
        \MessageBird\Wire\Model\ContactPropertyList::class => \MessageBird\Wire\Normalizer\ContactPropertyListNormalizer::class,
        
        \MessageBird\Wire\Model\ContactPropertyCreateRequest::class => \MessageBird\Wire\Normalizer\ContactPropertyCreateRequestNormalizer::class,
        
        \MessageBird\Wire\Model\ContactPropertyUpdateRequest::class => \MessageBird\Wire\Normalizer\ContactPropertyUpdateRequestNormalizer::class,
        
        \MessageBird\Wire\Model\AudienceCreateRequest::class => \MessageBird\Wire\Normalizer\AudienceCreateRequestNormalizer::class,
        
        \MessageBird\Wire\Model\AudienceUpdateRequest::class => \MessageBird\Wire\Normalizer\AudienceUpdateRequestNormalizer::class,
        
        \MessageBird\Wire\Model\AudienceMember::class => \MessageBird\Wire\Normalizer\AudienceMemberNormalizer::class,
        
        \MessageBird\Wire\Model\AudienceMemberList::class => \MessageBird\Wire\Normalizer\AudienceMemberListNormalizer::class,
        
        \MessageBird\Wire\Model\AudienceContactsAddRequest::class => \MessageBird\Wire\Normalizer\AudienceContactsAddRequestNormalizer::class,
        
        \MessageBird\Wire\Model\AudienceContactsRemoveRequest::class => \MessageBird\Wire\Normalizer\AudienceContactsRemoveRequestNormalizer::class,
        
        \MessageBird\Wire\Model\SMSSegments::class => \MessageBird\Wire\Normalizer\SMSSegmentsNormalizer::class,
        
        \MessageBird\Wire\Model\MessageCost::class => \MessageBird\Wire\Normalizer\MessageCostNormalizer::class,
        
        \MessageBird\Wire\Model\SMSError::class => \MessageBird\Wire\Normalizer\SMSErrorNormalizer::class,
        
        \MessageBird\Wire\Model\SMSMessage::class => \MessageBird\Wire\Normalizer\SMSMessageNormalizer::class,
        
        \MessageBird\Wire\Model\SMSMessageOptions::class => \MessageBird\Wire\Normalizer\SMSMessageOptionsNormalizer::class,
        
        \MessageBird\Wire\Model\SMSMessageList::class => \MessageBird\Wire\Normalizer\SMSMessageListNormalizer::class,
        
        \MessageBird\Wire\Model\SMSMessageSendRequest::class => \MessageBird\Wire\Normalizer\SMSMessageSendRequestNormalizer::class,
        
        \MessageBird\Wire\Model\SMSMessageSendRequestOptions::class => \MessageBird\Wire\Normalizer\SMSMessageSendRequestOptionsNormalizer::class,
        
        \MessageBird\Wire\Model\SMSMessageSendRequestTemplate::class => \MessageBird\Wire\Normalizer\SMSMessageSendRequestTemplateNormalizer::class,
        
        \MessageBird\Wire\Model\SMSBatchSummary::class => \MessageBird\Wire\Normalizer\SMSBatchSummaryNormalizer::class,
        
        \MessageBird\Wire\Model\SMSMessageBatchResponse::class => \MessageBird\Wire\Normalizer\SMSMessageBatchResponseNormalizer::class,
        
        \MessageBird\Wire\Model\SMSEvent::class => \MessageBird\Wire\Normalizer\SMSEventNormalizer::class,
        
        \MessageBird\Wire\Model\SMSEventList::class => \MessageBird\Wire\Normalizer\SMSEventListNormalizer::class,
        
        \MessageBird\Wire\Model\TemplateVariable::class => \MessageBird\Wire\Normalizer\TemplateVariableNormalizer::class,
        
        \MessageBird\Wire\Model\SMSTemplateLanguageState::class => \MessageBird\Wire\Normalizer\SMSTemplateLanguageStateNormalizer::class,
        
        \MessageBird\Wire\Model\SMSTemplate::class => \MessageBird\Wire\Normalizer\SMSTemplateNormalizer::class,
        
        \MessageBird\Wire\Model\SMSTemplateList::class => \MessageBird\Wire\Normalizer\SMSTemplateListNormalizer::class,
        
        \MessageBird\Wire\Model\SMSSuppression::class => \MessageBird\Wire\Normalizer\SMSSuppressionNormalizer::class,
        
        \MessageBird\Wire\Model\SMSSuppressionList::class => \MessageBird\Wire\Normalizer\SMSSuppressionListNormalizer::class,
        
        \MessageBird\Wire\Model\SMSSuppressionCreate::class => \MessageBird\Wire\Normalizer\SMSSuppressionCreateNormalizer::class,
        
        \MessageBird\Wire\Model\SMSKeywordRule::class => \MessageBird\Wire\Normalizer\SMSKeywordRuleNormalizer::class,
        
        \MessageBird\Wire\Model\SMSKeywordRuleList::class => \MessageBird\Wire\Normalizer\SMSKeywordRuleListNormalizer::class,
        
        \MessageBird\Wire\Model\SMSKeywordRuleCreate::class => \MessageBird\Wire\Normalizer\SMSKeywordRuleCreateNormalizer::class,
        
        \MessageBird\Wire\Model\SMSKeywordRuleUpdate::class => \MessageBird\Wire\Normalizer\SMSKeywordRuleUpdateNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsSummaryPeriod::class => \MessageBird\Wire\Normalizer\SMSStatsSummaryPeriodNormalizer::class,
        
        \MessageBird\Wire\Model\SMSLatencyQuantiles::class => \MessageBird\Wire\Normalizer\SMSLatencyQuantilesNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsComparisonDelta::class => \MessageBird\Wire\Normalizer\SMSStatsComparisonDeltaNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsComparisonDelivery::class => \MessageBird\Wire\Normalizer\SMSStatsComparisonDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsComparisonLatency::class => \MessageBird\Wire\Normalizer\SMSStatsComparisonLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsSummary::class => \MessageBird\Wire\Normalizer\SMSStatsSummaryNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsSummaryDelivery::class => \MessageBird\Wire\Normalizer\SMSStatsSummaryDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsSummaryLatency::class => \MessageBird\Wire\Normalizer\SMSStatsSummaryLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsSummaryComparison::class => \MessageBird\Wire\Normalizer\SMSStatsSummaryComparisonNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsSeriesPeriod::class => \MessageBird\Wire\Normalizer\SMSStatsSeriesPeriodNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsPoint::class => \MessageBird\Wire\Normalizer\SMSStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsPointDelivery::class => \MessageBird\Wire\Normalizer\SMSStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsResponse::class => \MessageBird\Wire\Normalizer\SMSStatsResponseNormalizer::class,
        
        \MessageBird\Wire\Model\SMSOriginatorStatsPoint::class => \MessageBird\Wire\Normalizer\SMSOriginatorStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\SMSOriginatorStatsPointDelivery::class => \MessageBird\Wire\Normalizer\SMSOriginatorStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\SMSOriginatorStatsPointLatency::class => \MessageBird\Wire\Normalizer\SMSOriginatorStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsByOriginatorResponse::class => \MessageBird\Wire\Normalizer\SMSStatsByOriginatorResponseNormalizer::class,
        
        \MessageBird\Wire\Model\SMSCountryStatsPoint::class => \MessageBird\Wire\Normalizer\SMSCountryStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\SMSCountryStatsPointDelivery::class => \MessageBird\Wire\Normalizer\SMSCountryStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\SMSCountryStatsPointLatency::class => \MessageBird\Wire\Normalizer\SMSCountryStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsByCountryResponse::class => \MessageBird\Wire\Normalizer\SMSStatsByCountryResponseNormalizer::class,
        
        \MessageBird\Wire\Model\SMSCategoryStatsPoint::class => \MessageBird\Wire\Normalizer\SMSCategoryStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\SMSCategoryStatsPointDelivery::class => \MessageBird\Wire\Normalizer\SMSCategoryStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\SMSCategoryStatsPointLatency::class => \MessageBird\Wire\Normalizer\SMSCategoryStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsByCategoryResponse::class => \MessageBird\Wire\Normalizer\SMSStatsByCategoryResponseNormalizer::class,
        
        \MessageBird\Wire\Model\SMSErrorCodeStatsPoint::class => \MessageBird\Wire\Normalizer\SMSErrorCodeStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\SMSErrorCodeStatsPointDelivery::class => \MessageBird\Wire\Normalizer\SMSErrorCodeStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\SMSErrorCodeStatsPointLatency::class => \MessageBird\Wire\Normalizer\SMSErrorCodeStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsByErrorCodeResponse::class => \MessageBird\Wire\Normalizer\SMSStatsByErrorCodeResponseNormalizer::class,
        
        \MessageBird\Wire\Model\SMSCarrierStatsPoint::class => \MessageBird\Wire\Normalizer\SMSCarrierStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\SMSCarrierStatsPointDelivery::class => \MessageBird\Wire\Normalizer\SMSCarrierStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\SMSCarrierStatsPointLatency::class => \MessageBird\Wire\Normalizer\SMSCarrierStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsByCarrierResponse::class => \MessageBird\Wire\Normalizer\SMSStatsByCarrierResponseNormalizer::class,
        
        \MessageBird\Wire\Model\SMSTagStatsPoint::class => \MessageBird\Wire\Normalizer\SMSTagStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\SMSTagStatsPointDelivery::class => \MessageBird\Wire\Normalizer\SMSTagStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\SMSTagStatsPointLatency::class => \MessageBird\Wire\Normalizer\SMSTagStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsByTagResponse::class => \MessageBird\Wire\Normalizer\SMSStatsByTagResponseNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatusStatsPoint::class => \MessageBird\Wire\Normalizer\SMSStatusStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\SMSStatsByStatusResponse::class => \MessageBird\Wire\Normalizer\SMSStatsByStatusResponseNormalizer::class,
        
        \MessageBird\Wire\Model\SMSInboundStatsComparisonDelta::class => \MessageBird\Wire\Normalizer\SMSInboundStatsComparisonDeltaNormalizer::class,
        
        \MessageBird\Wire\Model\SMSInboundStatsSummaryResponse::class => \MessageBird\Wire\Normalizer\SMSInboundStatsSummaryResponseNormalizer::class,
        
        \MessageBird\Wire\Model\SMSInboundStatsSummaryResponseComparison::class => \MessageBird\Wire\Normalizer\SMSInboundStatsSummaryResponseComparisonNormalizer::class,
        
        \MessageBird\Wire\Model\SMSInboundStatsPoint::class => \MessageBird\Wire\Normalizer\SMSInboundStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\SMSInboundStatsResponse::class => \MessageBird\Wire\Normalizer\SMSInboundStatsResponseNormalizer::class,
        
        \MessageBird\Wire\Model\SMSInboundCountryStatsPoint::class => \MessageBird\Wire\Normalizer\SMSInboundCountryStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\SMSInboundStatsByCountryResponse::class => \MessageBird\Wire\Normalizer\SMSInboundStatsByCountryResponseNormalizer::class,
        
        \MessageBird\Wire\Model\SMSInboundOperatorStatsPoint::class => \MessageBird\Wire\Normalizer\SMSInboundOperatorStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\SMSInboundStatsByOperatorResponse::class => \MessageBird\Wire\Normalizer\SMSInboundStatsByOperatorResponseNormalizer::class,
        
        \MessageBird\Wire\Model\SMSInboundNumberStatsPoint::class => \MessageBird\Wire\Normalizer\SMSInboundNumberStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\SMSInboundStatsByNumberResponse::class => \MessageBird\Wire\Normalizer\SMSInboundStatsByNumberResponseNormalizer::class,
        
        \MessageBird\Wire\Model\PhoneNumberLookupRequest::class => \MessageBird\Wire\Normalizer\PhoneNumberLookupRequestNormalizer::class,
        
        \MessageBird\Wire\Model\LookupPortingEvent::class => \MessageBird\Wire\Normalizer\LookupPortingEventNormalizer::class,
        
        \MessageBird\Wire\Model\PhoneNumberLookup::class => \MessageBird\Wire\Normalizer\PhoneNumberLookupNormalizer::class,
        
        \MessageBird\Wire\Model\PhoneNumberLookupNetworkInfo::class => \MessageBird\Wire\Normalizer\PhoneNumberLookupNetworkInfoNormalizer::class,
        
        \MessageBird\Wire\Model\PhoneNumberLookupOriginalNetworkInfo::class => \MessageBird\Wire\Normalizer\PhoneNumberLookupOriginalNetworkInfoNormalizer::class,
        
        \MessageBird\Wire\Model\PhoneNumberLookupClassification::class => \MessageBird\Wire\Normalizer\PhoneNumberLookupClassificationNormalizer::class,
        
        \MessageBird\Wire\Model\PhoneNumberLookupPresence::class => \MessageBird\Wire\Normalizer\PhoneNumberLookupPresenceNormalizer::class,
        
        \MessageBird\Wire\Model\PhoneNumberLookupRoaming::class => \MessageBird\Wire\Normalizer\PhoneNumberLookupRoamingNormalizer::class,
        
        \MessageBird\Wire\Model\PhoneNumberLookupSimSwap::class => \MessageBird\Wire\Normalizer\PhoneNumberLookupSimSwapNormalizer::class,
        
        \MessageBird\Wire\Model\PhoneNumberLookupPorting::class => \MessageBird\Wire\Normalizer\PhoneNumberLookupPortingNormalizer::class,
        
        \MessageBird\Wire\Model\PhoneNumberLookupScore::class => \MessageBird\Wire\Normalizer\PhoneNumberLookupScoreNormalizer::class,
        
        \MessageBird\Wire\Model\EmailLookupRequest::class => \MessageBird\Wire\Normalizer\EmailLookupRequestNormalizer::class,
        
        \MessageBird\Wire\Model\EmailLookup::class => \MessageBird\Wire\Normalizer\EmailLookupNormalizer::class,
        
        \MessageBird\Wire\Model\VerificationTo::class => \MessageBird\Wire\Normalizer\VerificationToNormalizer::class,
        
        \MessageBird\Wire\Model\VerificationChannelEntry::class => \MessageBird\Wire\Normalizer\VerificationChannelEntryNormalizer::class,
        
        \MessageBird\Wire\Model\Verification::class => \MessageBird\Wire\Normalizer\VerificationNormalizer::class,
        
        \MessageBird\Wire\Model\VerificationOptions::class => \MessageBird\Wire\Normalizer\VerificationOptionsNormalizer::class,
        
        \MessageBird\Wire\Model\VerificationCreateRequest::class => \MessageBird\Wire\Normalizer\VerificationCreateRequestNormalizer::class,
        
        \MessageBird\Wire\Model\VerificationCheckRequest::class => \MessageBird\Wire\Normalizer\VerificationCheckRequestNormalizer::class,
        
        \MessageBird\Wire\Model\VerificationCheckResult::class => \MessageBird\Wire\Normalizer\VerificationCheckResultNormalizer::class,
        
        \MessageBird\Wire\Model\VerificationNextChannelRequest::class => \MessageBird\Wire\Normalizer\VerificationNextChannelRequestNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageTemplateComponentParameter::class => \MessageBird\Wire\Normalizer\WhatsAppMessageTemplateComponentParameterNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageTemplateComponentParameterLocation::class => \MessageBird\Wire\Normalizer\WhatsAppMessageTemplateComponentParameterLocationNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageTemplateCardComponent::class => \MessageBird\Wire\Normalizer\WhatsAppMessageTemplateCardComponentNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageTemplateCard::class => \MessageBird\Wire\Normalizer\WhatsAppMessageTemplateCardNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageTemplateComponent::class => \MessageBird\Wire\Normalizer\WhatsAppMessageTemplateComponentNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageTemplate::class => \MessageBird\Wire\Normalizer\WhatsAppMessageTemplateNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppContactPhone::class => \MessageBird\Wire\Normalizer\WhatsAppContactPhoneNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppContactEmail::class => \MessageBird\Wire\Normalizer\WhatsAppContactEmailNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppContactUrl::class => \MessageBird\Wire\Normalizer\WhatsAppContactUrlNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppContactAddress::class => \MessageBird\Wire\Normalizer\WhatsAppContactAddressNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppContactCard::class => \MessageBird\Wire\Normalizer\WhatsAppContactCardNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppContactCardName::class => \MessageBird\Wire\Normalizer\WhatsAppContactCardNameNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppContactCardOrg::class => \MessageBird\Wire\Normalizer\WhatsAppContactCardOrgNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppError::class => \MessageBird\Wire\Normalizer\WhatsAppErrorNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessage::class => \MessageBird\Wire\Normalizer\WhatsAppMessageNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageFrom::class => \MessageBird\Wire\Normalizer\WhatsAppMessageFromNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageTo::class => \MessageBird\Wire\Normalizer\WhatsAppMessageToNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageText::class => \MessageBird\Wire\Normalizer\WhatsAppMessageTextNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageImage::class => \MessageBird\Wire\Normalizer\WhatsAppMessageImageNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageVideo::class => \MessageBird\Wire\Normalizer\WhatsAppMessageVideoNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageAudio::class => \MessageBird\Wire\Normalizer\WhatsAppMessageAudioNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageSticker::class => \MessageBird\Wire\Normalizer\WhatsAppMessageStickerNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageDocument::class => \MessageBird\Wire\Normalizer\WhatsAppMessageDocumentNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageLocation::class => \MessageBird\Wire\Normalizer\WhatsAppMessageLocationNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageUnsupported::class => \MessageBird\Wire\Normalizer\WhatsAppMessageUnsupportedNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageList::class => \MessageBird\Wire\Normalizer\WhatsAppMessageListNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageSendRequest::class => \MessageBird\Wire\Normalizer\WhatsAppMessageSendRequestNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageSendRequestTemplate::class => \MessageBird\Wire\Normalizer\WhatsAppMessageSendRequestTemplateNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageSendRequestText::class => \MessageBird\Wire\Normalizer\WhatsAppMessageSendRequestTextNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageSendRequestImage::class => \MessageBird\Wire\Normalizer\WhatsAppMessageSendRequestImageNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageSendRequestVideo::class => \MessageBird\Wire\Normalizer\WhatsAppMessageSendRequestVideoNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageSendRequestAudio::class => \MessageBird\Wire\Normalizer\WhatsAppMessageSendRequestAudioNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageSendRequestSticker::class => \MessageBird\Wire\Normalizer\WhatsAppMessageSendRequestStickerNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageSendRequestDocument::class => \MessageBird\Wire\Normalizer\WhatsAppMessageSendRequestDocumentNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppMessageSendRequestLocation::class => \MessageBird\Wire\Normalizer\WhatsAppMessageSendRequestLocationNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppEvent::class => \MessageBird\Wire\Normalizer\WhatsAppEventNormalizer::class,
        
        \MessageBird\Wire\Model\WhatsAppEventList::class => \MessageBird\Wire\Normalizer\WhatsAppEventListNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsSeriesPeriod::class => \MessageBird\Wire\Normalizer\EmailStatsSeriesPeriodNormalizer::class,
        
        \MessageBird\Wire\Model\EmailDeliveryStatsBounces::class => \MessageBird\Wire\Normalizer\EmailDeliveryStatsBouncesNormalizer::class,
        
        \MessageBird\Wire\Model\EmailLatencyQuantiles::class => \MessageBird\Wire\Normalizer\EmailLatencyQuantilesNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsPoint::class => \MessageBird\Wire\Normalizer\EmailStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsPointDelivery::class => \MessageBird\Wire\Normalizer\EmailStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsPointEngagement::class => \MessageBird\Wire\Normalizer\EmailStatsPointEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsPointLatency::class => \MessageBird\Wire\Normalizer\EmailStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsResponse::class => \MessageBird\Wire\Normalizer\EmailStatsResponseNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsPeriod::class => \MessageBird\Wire\Normalizer\EmailStatsPeriodNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsSeriesPoint::class => \MessageBird\Wire\Normalizer\EmailStatsSeriesPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailTagStatsPoint::class => \MessageBird\Wire\Normalizer\EmailTagStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailTagStatsPointDelivery::class => \MessageBird\Wire\Normalizer\EmailTagStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\EmailTagStatsPointEngagement::class => \MessageBird\Wire\Normalizer\EmailTagStatsPointEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\EmailTagStatsPointLatency::class => \MessageBird\Wire\Normalizer\EmailTagStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsTagsResponse::class => \MessageBird\Wire\Normalizer\EmailStatsTagsResponseNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsSummaryPeriod::class => \MessageBird\Wire\Normalizer\EmailStatsSummaryPeriodNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsComparisonDelta::class => \MessageBird\Wire\Normalizer\EmailStatsComparisonDeltaNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsComparisonDelivery::class => \MessageBird\Wire\Normalizer\EmailStatsComparisonDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsComparisonEngagement::class => \MessageBird\Wire\Normalizer\EmailStatsComparisonEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsComparisonLatency::class => \MessageBird\Wire\Normalizer\EmailStatsComparisonLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsSummary::class => \MessageBird\Wire\Normalizer\EmailStatsSummaryNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsSummaryDelivery::class => \MessageBird\Wire\Normalizer\EmailStatsSummaryDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsSummaryEngagement::class => \MessageBird\Wire\Normalizer\EmailStatsSummaryEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsSummaryLatency::class => \MessageBird\Wire\Normalizer\EmailStatsSummaryLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsSummaryComparison::class => \MessageBird\Wire\Normalizer\EmailStatsSummaryComparisonNormalizer::class,
        
        \MessageBird\Wire\Model\EmailSendingIpDeliveryStatsBounces::class => \MessageBird\Wire\Normalizer\EmailSendingIpDeliveryStatsBouncesNormalizer::class,
        
        \MessageBird\Wire\Model\EmailSendingIpStatsPoint::class => \MessageBird\Wire\Normalizer\EmailSendingIpStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailSendingIpStatsPointDelivery::class => \MessageBird\Wire\Normalizer\EmailSendingIpStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\EmailSendingIpStatsPointLatency::class => \MessageBird\Wire\Normalizer\EmailSendingIpStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsBySendingIpResponse::class => \MessageBird\Wire\Normalizer\EmailStatsBySendingIpResponseNormalizer::class,
        
        \MessageBird\Wire\Model\EmailSendingDomainStatsPoint::class => \MessageBird\Wire\Normalizer\EmailSendingDomainStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailSendingDomainStatsPointDelivery::class => \MessageBird\Wire\Normalizer\EmailSendingDomainStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\EmailSendingDomainStatsPointEngagement::class => \MessageBird\Wire\Normalizer\EmailSendingDomainStatsPointEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\EmailSendingDomainStatsPointLatency::class => \MessageBird\Wire\Normalizer\EmailSendingDomainStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsBySendingDomainResponse::class => \MessageBird\Wire\Normalizer\EmailStatsBySendingDomainResponseNormalizer::class,
        
        \MessageBird\Wire\Model\EmailCategoryStatsPoint::class => \MessageBird\Wire\Normalizer\EmailCategoryStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailCategoryStatsPointDelivery::class => \MessageBird\Wire\Normalizer\EmailCategoryStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\EmailCategoryStatsPointEngagement::class => \MessageBird\Wire\Normalizer\EmailCategoryStatsPointEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\EmailCategoryStatsPointLatency::class => \MessageBird\Wire\Normalizer\EmailCategoryStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsByCategoryResponse::class => \MessageBird\Wire\Normalizer\EmailStatsByCategoryResponseNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMailboxProviderDeliveryStatsBounces::class => \MessageBird\Wire\Normalizer\EmailMailboxProviderDeliveryStatsBouncesNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMailboxProviderStatsPoint::class => \MessageBird\Wire\Normalizer\EmailMailboxProviderStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMailboxProviderStatsPointDelivery::class => \MessageBird\Wire\Normalizer\EmailMailboxProviderStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMailboxProviderStatsPointEngagement::class => \MessageBird\Wire\Normalizer\EmailMailboxProviderStatsPointEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMailboxProviderStatsPointLatency::class => \MessageBird\Wire\Normalizer\EmailMailboxProviderStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsByMailboxProviderResponse::class => \MessageBird\Wire\Normalizer\EmailStatsByMailboxProviderResponseNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMailboxProviderRegionStatsPoint::class => \MessageBird\Wire\Normalizer\EmailMailboxProviderRegionStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMailboxProviderRegionStatsPointDelivery::class => \MessageBird\Wire\Normalizer\EmailMailboxProviderRegionStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMailboxProviderRegionStatsPointEngagement::class => \MessageBird\Wire\Normalizer\EmailMailboxProviderRegionStatsPointEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMailboxProviderRegionStatsPointLatency::class => \MessageBird\Wire\Normalizer\EmailMailboxProviderRegionStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsByMailboxProviderRegionResponse::class => \MessageBird\Wire\Normalizer\EmailStatsByMailboxProviderRegionResponseNormalizer::class,
        
        \MessageBird\Wire\Model\EmailRecipientDomainStatsPoint::class => \MessageBird\Wire\Normalizer\EmailRecipientDomainStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailRecipientDomainStatsPointDelivery::class => \MessageBird\Wire\Normalizer\EmailRecipientDomainStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\EmailRecipientDomainStatsPointEngagement::class => \MessageBird\Wire\Normalizer\EmailRecipientDomainStatsPointEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\EmailRecipientDomainStatsPointLatency::class => \MessageBird\Wire\Normalizer\EmailRecipientDomainStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsByRecipientDomainResponse::class => \MessageBird\Wire\Normalizer\EmailStatsByRecipientDomainResponseNormalizer::class,
        
        \MessageBird\Wire\Model\EmailTemplateStatsPoint::class => \MessageBird\Wire\Normalizer\EmailTemplateStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailTemplateStatsPointDelivery::class => \MessageBird\Wire\Normalizer\EmailTemplateStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\EmailTemplateStatsPointEngagement::class => \MessageBird\Wire\Normalizer\EmailTemplateStatsPointEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\EmailTemplateStatsPointLatency::class => \MessageBird\Wire\Normalizer\EmailTemplateStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsByTemplateResponse::class => \MessageBird\Wire\Normalizer\EmailStatsByTemplateResponseNormalizer::class,
        
        \MessageBird\Wire\Model\EmailLocationStatsPoint::class => \MessageBird\Wire\Normalizer\EmailLocationStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailLocationStatsPointEngagement::class => \MessageBird\Wire\Normalizer\EmailLocationStatsPointEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsByLocationResponse::class => \MessageBird\Wire\Normalizer\EmailStatsByLocationResponseNormalizer::class,
        
        \MessageBird\Wire\Model\EmailClientStatsPoint::class => \MessageBird\Wire\Normalizer\EmailClientStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailClientStatsPointEngagement::class => \MessageBird\Wire\Normalizer\EmailClientStatsPointEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsByClientResponse::class => \MessageBird\Wire\Normalizer\EmailStatsByClientResponseNormalizer::class,
        
        \MessageBird\Wire\Model\EmailBounceCodeStatsPoint::class => \MessageBird\Wire\Normalizer\EmailBounceCodeStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailBounceCodeStatsPointBounces::class => \MessageBird\Wire\Normalizer\EmailBounceCodeStatsPointBouncesNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsByBounceCodeResponse::class => \MessageBird\Wire\Normalizer\EmailStatsByBounceCodeResponseNormalizer::class,
        
        \MessageBird\Wire\Model\EmailComplaintTypeStatsPoint::class => \MessageBird\Wire\Normalizer\EmailComplaintTypeStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsByComplaintTypeResponse::class => \MessageBird\Wire\Normalizer\EmailStatsByComplaintTypeResponseNormalizer::class,
        
        \MessageBird\Wire\Model\EmailBroadcastStatsPoint::class => \MessageBird\Wire\Normalizer\EmailBroadcastStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\EmailBroadcastStatsPointDelivery::class => \MessageBird\Wire\Normalizer\EmailBroadcastStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\EmailBroadcastStatsPointEngagement::class => \MessageBird\Wire\Normalizer\EmailBroadcastStatsPointEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\EmailBroadcastStatsPointLatency::class => \MessageBird\Wire\Normalizer\EmailBroadcastStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\EmailStatsByBroadcastResponse::class => \MessageBird\Wire\Normalizer\EmailStatsByBroadcastResponseNormalizer::class,
        
        \MessageBird\Wire\Model\DomainSettings::class => \MessageBird\Wire\Normalizer\DomainSettingsNormalizer::class,
        
        \MessageBird\Wire\Model\DomainDKIM::class => \MessageBird\Wire\Normalizer\DomainDKIMNormalizer::class,
        
        \MessageBird\Wire\Model\DomainCapabilityPending::class => \MessageBird\Wire\Normalizer\DomainCapabilityPendingNormalizer::class,
        
        \MessageBird\Wire\Model\DomainCapability::class => \MessageBird\Wire\Normalizer\DomainCapabilityNormalizer::class,
        
        \MessageBird\Wire\Model\DomainCapabilities::class => \MessageBird\Wire\Normalizer\DomainCapabilitiesNormalizer::class,
        
        \MessageBird\Wire\Model\DNSRecord::class => \MessageBird\Wire\Normalizer\DNSRecordNormalizer::class,
        
        \MessageBird\Wire\Model\Domain::class => \MessageBird\Wire\Normalizer\DomainNormalizer::class,
        
        \MessageBird\Wire\Model\DomainList::class => \MessageBird\Wire\Normalizer\DomainListNormalizer::class,
        
        \MessageBird\Wire\Model\DomainReturnPathConfig::class => \MessageBird\Wire\Normalizer\DomainReturnPathConfigNormalizer::class,
        
        \MessageBird\Wire\Model\DomainTrackingConfig::class => \MessageBird\Wire\Normalizer\DomainTrackingConfigNormalizer::class,
        
        \MessageBird\Wire\Model\DomainDKIMConfig::class => \MessageBird\Wire\Normalizer\DomainDKIMConfigNormalizer::class,
        
        \MessageBird\Wire\Model\DomainCreate::class => \MessageBird\Wire\Normalizer\DomainCreateNormalizer::class,
        
        \MessageBird\Wire\Model\DomainInboundConfig::class => \MessageBird\Wire\Normalizer\DomainInboundConfigNormalizer::class,
        
        \MessageBird\Wire\Model\DomainUpdate::class => \MessageBird\Wire\Normalizer\DomainUpdateNormalizer::class,
        
        \MessageBird\Wire\Model\DomainUpdateTracking::class => \MessageBird\Wire\Normalizer\DomainUpdateTrackingNormalizer::class,
        
        \MessageBird\Wire\Model\DomainEvent::class => \MessageBird\Wire\Normalizer\DomainEventNormalizer::class,
        
        \MessageBird\Wire\Model\DomainEventList::class => \MessageBird\Wire\Normalizer\DomainEventListNormalizer::class,
        
        \MessageBird\Wire\Model\ShareDomainDnsRequest::class => \MessageBird\Wire\Normalizer\ShareDomainDnsRequestNormalizer::class,
        
        \MessageBird\Wire\Model\MailboxOwner::class => \MessageBird\Wire\Normalizer\MailboxOwnerNormalizer::class,
        
        \MessageBird\Wire\Model\Mailbox::class => \MessageBird\Wire\Normalizer\MailboxNormalizer::class,
        
        \MessageBird\Wire\Model\MailboxList::class => \MessageBird\Wire\Normalizer\MailboxListNormalizer::class,
        
        \MessageBird\Wire\Model\MailboxCreate::class => \MessageBird\Wire\Normalizer\MailboxCreateNormalizer::class,
        
        \MessageBird\Wire\Model\MailboxUpdate::class => \MessageBird\Wire\Normalizer\MailboxUpdateNormalizer::class,
        
        \MessageBird\Wire\Model\MailboxStatsSummary::class => \MessageBird\Wire\Normalizer\MailboxStatsSummaryNormalizer::class,
        
        \MessageBird\Wire\Model\MailboxStatsSummaryDelivery::class => \MessageBird\Wire\Normalizer\MailboxStatsSummaryDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\MailboxStatsSummaryEngagement::class => \MessageBird\Wire\Normalizer\MailboxStatsSummaryEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\MailboxStatsSummaryLatency::class => \MessageBird\Wire\Normalizer\MailboxStatsSummaryLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\MailboxStatsPoint::class => \MessageBird\Wire\Normalizer\MailboxStatsPointNormalizer::class,
        
        \MessageBird\Wire\Model\MailboxStatsPointDelivery::class => \MessageBird\Wire\Normalizer\MailboxStatsPointDeliveryNormalizer::class,
        
        \MessageBird\Wire\Model\MailboxStatsPointEngagement::class => \MessageBird\Wire\Normalizer\MailboxStatsPointEngagementNormalizer::class,
        
        \MessageBird\Wire\Model\MailboxStatsPointLatency::class => \MessageBird\Wire\Normalizer\MailboxStatsPointLatencyNormalizer::class,
        
        \MessageBird\Wire\Model\MailboxStatsResponse::class => \MessageBird\Wire\Normalizer\MailboxStatsResponseNormalizer::class,
        
        \MessageBird\Wire\Model\ReceiveRule::class => \MessageBird\Wire\Normalizer\ReceiveRuleNormalizer::class,
        
        \MessageBird\Wire\Model\ReceiveRuleList::class => \MessageBird\Wire\Normalizer\ReceiveRuleListNormalizer::class,
        
        \MessageBird\Wire\Model\ReceiveRuleCreate::class => \MessageBird\Wire\Normalizer\ReceiveRuleCreateNormalizer::class,
        
        \MessageBird\Wire\Model\EmailThreadHighlights::class => \MessageBird\Wire\Normalizer\EmailThreadHighlightsNormalizer::class,
        
        \MessageBird\Wire\Model\EmailThread::class => \MessageBird\Wire\Normalizer\EmailThreadNormalizer::class,
        
        \MessageBird\Wire\Model\EmailThreadList::class => \MessageBird\Wire\Normalizer\EmailThreadListNormalizer::class,
        
        \MessageBird\Wire\Model\EmailLabelsUpdate::class => \MessageBird\Wire\Normalizer\EmailLabelsUpdateNormalizer::class,
        
        \MessageBird\Wire\Model\EmailThreadUpdateRequest::class => \MessageBird\Wire\Normalizer\EmailThreadUpdateRequestNormalizer::class,
        
        \MessageBird\Wire\Model\EmailThreadMessageRecipient::class => \MessageBird\Wire\Normalizer\EmailThreadMessageRecipientNormalizer::class,
        
        \MessageBird\Wire\Model\EmailThreadMessageAttachment::class => \MessageBird\Wire\Normalizer\EmailThreadMessageAttachmentNormalizer::class,
        
        \MessageBird\Wire\Model\EmailThreadMessageSource::class => \MessageBird\Wire\Normalizer\EmailThreadMessageSourceNormalizer::class,
        
        \MessageBird\Wire\Model\EmailThreadMessage::class => \MessageBird\Wire\Normalizer\EmailThreadMessageNormalizer::class,
        
        \MessageBird\Wire\Model\EmailThreadMessageList::class => \MessageBird\Wire\Normalizer\EmailThreadMessageListNormalizer::class,
        
        \MessageBird\Wire\Model\EmailThreadMessageUpdateRequest::class => \MessageBird\Wire\Normalizer\EmailThreadMessageUpdateRequestNormalizer::class,
        
        \MessageBird\Wire\Model\EmailThreadMessageBody::class => \MessageBird\Wire\Normalizer\EmailThreadMessageBodyNormalizer::class,
        
        \MessageBird\Wire\Model\EmailThreadMessageAttachmentList::class => \MessageBird\Wire\Normalizer\EmailThreadMessageAttachmentListNormalizer::class,
        
        \MessageBird\Wire\Model\EmailThreadMessageReplyRequest::class => \MessageBird\Wire\Normalizer\EmailThreadMessageReplyRequestNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMailboxComposeRequest::class => \MessageBird\Wire\Normalizer\EmailMailboxComposeRequestNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMailboxLabel::class => \MessageBird\Wire\Normalizer\EmailMailboxLabelNormalizer::class,
        
        \MessageBird\Wire\Model\EmailMailboxLabelList::class => \MessageBird\Wire\Normalizer\EmailMailboxLabelListNormalizer::class,
        
        \MessageBird\Wire\Model\NumberOwnership::class => \MessageBird\Wire\Normalizer\NumberOwnershipNormalizer::class,
        
        \MessageBird\Wire\Model\Number::class => \MessageBird\Wire\Normalizer\NumberNormalizer::class,
        
        \MessageBird\Wire\Model\NumberList::class => \MessageBird\Wire\Normalizer\NumberListNormalizer::class,
        
        \MessageBird\Wire\Model\AvailableNumber::class => \MessageBird\Wire\Normalizer\AvailableNumberNormalizer::class,
        
        \MessageBird\Wire\Model\AvailableNumberList::class => \MessageBird\Wire\Normalizer\AvailableNumberListNormalizer::class,
        
        \MessageBird\Wire\Model\NumbersOrder::class => \MessageBird\Wire\Normalizer\NumbersOrderNormalizer::class,
        
        \MessageBird\Wire\Model\NumbersOrderList::class => \MessageBird\Wire\Normalizer\NumbersOrderListNormalizer::class,
        
        \MessageBird\Wire\Model\NumbersOrderCreate::class => \MessageBird\Wire\Normalizer\NumbersOrderCreateNormalizer::class,
        
        \MessageBird\Wire\Model\VoiceMediaQuality::class => \MessageBird\Wire\Normalizer\VoiceMediaQualityNormalizer::class,
        
        \MessageBird\Wire\Model\VoiceCallCost::class => \MessageBird\Wire\Normalizer\VoiceCallCostNormalizer::class,
        
        \MessageBird\Wire\Model\VoiceCall::class => \MessageBird\Wire\Normalizer\VoiceCallNormalizer::class,
        
        \MessageBird\Wire\Model\VoiceCallActor::class => \MessageBird\Wire\Normalizer\VoiceCallActorNormalizer::class,
        
        \MessageBird\Wire\Model\VoiceCallList::class => \MessageBird\Wire\Normalizer\VoiceCallListNormalizer::class,
        
        \Jane\Component\JsonSchemaRuntime\Reference::class => \MessageBird\Wire\Runtime\Normalizer\ReferenceNormalizer::class,
    ], $normalizersCache = [];
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $normalizerClass = $this->normalizers[get_class($data)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($data, $format, $context);
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $denormalizerClass = $this->normalizers[$type];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $type, $format, $context);
    }
    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }
    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;
        return $normalizer;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [
            
            \MessageBird\Wire\Model\ErrorDetail::class => false,
            \MessageBird\Wire\Model\NextAction::class => false,
            \MessageBird\Wire\Model\ErrorBody::class => false,
            \MessageBird\Wire\Model\Error::class => false,
            \MessageBird\Wire\Model\RealtimePublish::class => false,
            \MessageBird\Wire\Model\RealtimeChannelListItem::class => false,
            \MessageBird\Wire\Model\RealtimePublishResult::class => false,
            \MessageBird\Wire\Model\RealtimeBatchEvent::class => false,
            \MessageBird\Wire\Model\RealtimeBatchPublish::class => false,
            \MessageBird\Wire\Model\RealtimeBatchPublishResultItem::class => false,
            \MessageBird\Wire\Model\RealtimeBatchPublishResult::class => false,
            \MessageBird\Wire\Model\RealtimeChannelsList::class => false,
            \MessageBird\Wire\Model\RealtimeChannelInfo::class => false,
            \MessageBird\Wire\Model\RealtimeChannelMember::class => false,
            \MessageBird\Wire\Model\RealtimeChannelMembers::class => false,
            \MessageBird\Wire\Model\RealtimeMemberPublish::class => false,
            \MessageBird\Wire\Model\EmailAddress::class => false,
            \MessageBird\Wire\Model\Tag::class => false,
            \MessageBird\Wire\Model\EmailAttachmentRef::class => false,
            \MessageBird\Wire\Model\EmailMessage::class => false,
            \MessageBird\Wire\Model\EmailMessageList::class => false,
            \MessageBird\Wire\Model\EmailAttachment::class => false,
            \MessageBird\Wire\Model\EmailMessageSendRequest::class => false,
            \MessageBird\Wire\Model\EmailMessageSendRequestTemplate::class => false,
            \MessageBird\Wire\Model\EmailMessageBatchItem::class => false,
            \MessageBird\Wire\Model\EmailMessageBatchResponse::class => false,
            \MessageBird\Wire\Model\EmailRecipient::class => false,
            \MessageBird\Wire\Model\EmailRecipientList::class => false,
            \MessageBird\Wire\Model\EmailEvent::class => false,
            \MessageBird\Wire\Model\EmailEventList::class => false,
            \MessageBird\Wire\Model\EmailMessageContent::class => false,
            \MessageBird\Wire\Model\AudienceRef::class => false,
            \MessageBird\Wire\Model\Contact::class => false,
            \MessageBird\Wire\Model\ContactList::class => false,
            \MessageBird\Wire\Model\ContactCreateRequest::class => false,
            \MessageBird\Wire\Model\ContactUpsertRequest::class => false,
            \MessageBird\Wire\Model\ContactUpsertEntry::class => false,
            \MessageBird\Wire\Model\ContactUpsertError::class => false,
            \MessageBird\Wire\Model\ContactUpsertResultItem::class => false,
            \MessageBird\Wire\Model\ContactUpsertResult::class => false,
            \MessageBird\Wire\Model\ContactUpdateRequest::class => false,
            \MessageBird\Wire\Model\Audience::class => false,
            \MessageBird\Wire\Model\AudienceList::class => false,
            \MessageBird\Wire\Model\Preference::class => false,
            \MessageBird\Wire\Model\PreferenceList::class => false,
            \MessageBird\Wire\Model\PreferenceCreate::class => false,
            \MessageBird\Wire\Model\PreferenceWriteResult::class => false,
            \MessageBird\Wire\Model\ContactProperty::class => false,
            \MessageBird\Wire\Model\ContactPropertyList::class => false,
            \MessageBird\Wire\Model\ContactPropertyCreateRequest::class => false,
            \MessageBird\Wire\Model\ContactPropertyUpdateRequest::class => false,
            \MessageBird\Wire\Model\AudienceCreateRequest::class => false,
            \MessageBird\Wire\Model\AudienceUpdateRequest::class => false,
            \MessageBird\Wire\Model\AudienceMember::class => false,
            \MessageBird\Wire\Model\AudienceMemberList::class => false,
            \MessageBird\Wire\Model\AudienceContactsAddRequest::class => false,
            \MessageBird\Wire\Model\AudienceContactsRemoveRequest::class => false,
            \MessageBird\Wire\Model\SMSSegments::class => false,
            \MessageBird\Wire\Model\MessageCost::class => false,
            \MessageBird\Wire\Model\SMSError::class => false,
            \MessageBird\Wire\Model\SMSMessage::class => false,
            \MessageBird\Wire\Model\SMSMessageOptions::class => false,
            \MessageBird\Wire\Model\SMSMessageList::class => false,
            \MessageBird\Wire\Model\SMSMessageSendRequest::class => false,
            \MessageBird\Wire\Model\SMSMessageSendRequestOptions::class => false,
            \MessageBird\Wire\Model\SMSMessageSendRequestTemplate::class => false,
            \MessageBird\Wire\Model\SMSBatchSummary::class => false,
            \MessageBird\Wire\Model\SMSMessageBatchResponse::class => false,
            \MessageBird\Wire\Model\SMSEvent::class => false,
            \MessageBird\Wire\Model\SMSEventList::class => false,
            \MessageBird\Wire\Model\TemplateVariable::class => false,
            \MessageBird\Wire\Model\SMSTemplateLanguageState::class => false,
            \MessageBird\Wire\Model\SMSTemplate::class => false,
            \MessageBird\Wire\Model\SMSTemplateList::class => false,
            \MessageBird\Wire\Model\SMSSuppression::class => false,
            \MessageBird\Wire\Model\SMSSuppressionList::class => false,
            \MessageBird\Wire\Model\SMSSuppressionCreate::class => false,
            \MessageBird\Wire\Model\SMSKeywordRule::class => false,
            \MessageBird\Wire\Model\SMSKeywordRuleList::class => false,
            \MessageBird\Wire\Model\SMSKeywordRuleCreate::class => false,
            \MessageBird\Wire\Model\SMSKeywordRuleUpdate::class => false,
            \MessageBird\Wire\Model\SMSStatsSummaryPeriod::class => false,
            \MessageBird\Wire\Model\SMSLatencyQuantiles::class => false,
            \MessageBird\Wire\Model\SMSStatsComparisonDelta::class => false,
            \MessageBird\Wire\Model\SMSStatsComparisonDelivery::class => false,
            \MessageBird\Wire\Model\SMSStatsComparisonLatency::class => false,
            \MessageBird\Wire\Model\SMSStatsSummary::class => false,
            \MessageBird\Wire\Model\SMSStatsSummaryDelivery::class => false,
            \MessageBird\Wire\Model\SMSStatsSummaryLatency::class => false,
            \MessageBird\Wire\Model\SMSStatsSummaryComparison::class => false,
            \MessageBird\Wire\Model\SMSStatsSeriesPeriod::class => false,
            \MessageBird\Wire\Model\SMSStatsPoint::class => false,
            \MessageBird\Wire\Model\SMSStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\SMSStatsResponse::class => false,
            \MessageBird\Wire\Model\SMSOriginatorStatsPoint::class => false,
            \MessageBird\Wire\Model\SMSOriginatorStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\SMSOriginatorStatsPointLatency::class => false,
            \MessageBird\Wire\Model\SMSStatsByOriginatorResponse::class => false,
            \MessageBird\Wire\Model\SMSCountryStatsPoint::class => false,
            \MessageBird\Wire\Model\SMSCountryStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\SMSCountryStatsPointLatency::class => false,
            \MessageBird\Wire\Model\SMSStatsByCountryResponse::class => false,
            \MessageBird\Wire\Model\SMSCategoryStatsPoint::class => false,
            \MessageBird\Wire\Model\SMSCategoryStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\SMSCategoryStatsPointLatency::class => false,
            \MessageBird\Wire\Model\SMSStatsByCategoryResponse::class => false,
            \MessageBird\Wire\Model\SMSErrorCodeStatsPoint::class => false,
            \MessageBird\Wire\Model\SMSErrorCodeStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\SMSErrorCodeStatsPointLatency::class => false,
            \MessageBird\Wire\Model\SMSStatsByErrorCodeResponse::class => false,
            \MessageBird\Wire\Model\SMSCarrierStatsPoint::class => false,
            \MessageBird\Wire\Model\SMSCarrierStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\SMSCarrierStatsPointLatency::class => false,
            \MessageBird\Wire\Model\SMSStatsByCarrierResponse::class => false,
            \MessageBird\Wire\Model\SMSTagStatsPoint::class => false,
            \MessageBird\Wire\Model\SMSTagStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\SMSTagStatsPointLatency::class => false,
            \MessageBird\Wire\Model\SMSStatsByTagResponse::class => false,
            \MessageBird\Wire\Model\SMSStatusStatsPoint::class => false,
            \MessageBird\Wire\Model\SMSStatsByStatusResponse::class => false,
            \MessageBird\Wire\Model\SMSInboundStatsComparisonDelta::class => false,
            \MessageBird\Wire\Model\SMSInboundStatsSummaryResponse::class => false,
            \MessageBird\Wire\Model\SMSInboundStatsSummaryResponseComparison::class => false,
            \MessageBird\Wire\Model\SMSInboundStatsPoint::class => false,
            \MessageBird\Wire\Model\SMSInboundStatsResponse::class => false,
            \MessageBird\Wire\Model\SMSInboundCountryStatsPoint::class => false,
            \MessageBird\Wire\Model\SMSInboundStatsByCountryResponse::class => false,
            \MessageBird\Wire\Model\SMSInboundOperatorStatsPoint::class => false,
            \MessageBird\Wire\Model\SMSInboundStatsByOperatorResponse::class => false,
            \MessageBird\Wire\Model\SMSInboundNumberStatsPoint::class => false,
            \MessageBird\Wire\Model\SMSInboundStatsByNumberResponse::class => false,
            \MessageBird\Wire\Model\PhoneNumberLookupRequest::class => false,
            \MessageBird\Wire\Model\LookupPortingEvent::class => false,
            \MessageBird\Wire\Model\PhoneNumberLookup::class => false,
            \MessageBird\Wire\Model\PhoneNumberLookupNetworkInfo::class => false,
            \MessageBird\Wire\Model\PhoneNumberLookupOriginalNetworkInfo::class => false,
            \MessageBird\Wire\Model\PhoneNumberLookupClassification::class => false,
            \MessageBird\Wire\Model\PhoneNumberLookupPresence::class => false,
            \MessageBird\Wire\Model\PhoneNumberLookupRoaming::class => false,
            \MessageBird\Wire\Model\PhoneNumberLookupSimSwap::class => false,
            \MessageBird\Wire\Model\PhoneNumberLookupPorting::class => false,
            \MessageBird\Wire\Model\PhoneNumberLookupScore::class => false,
            \MessageBird\Wire\Model\EmailLookupRequest::class => false,
            \MessageBird\Wire\Model\EmailLookup::class => false,
            \MessageBird\Wire\Model\VerificationTo::class => false,
            \MessageBird\Wire\Model\VerificationChannelEntry::class => false,
            \MessageBird\Wire\Model\Verification::class => false,
            \MessageBird\Wire\Model\VerificationOptions::class => false,
            \MessageBird\Wire\Model\VerificationCreateRequest::class => false,
            \MessageBird\Wire\Model\VerificationCheckRequest::class => false,
            \MessageBird\Wire\Model\VerificationCheckResult::class => false,
            \MessageBird\Wire\Model\VerificationNextChannelRequest::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageTemplateComponentParameter::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageTemplateComponentParameterLocation::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageTemplateCardComponent::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageTemplateCard::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageTemplateComponent::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageTemplate::class => false,
            \MessageBird\Wire\Model\WhatsAppContactPhone::class => false,
            \MessageBird\Wire\Model\WhatsAppContactEmail::class => false,
            \MessageBird\Wire\Model\WhatsAppContactUrl::class => false,
            \MessageBird\Wire\Model\WhatsAppContactAddress::class => false,
            \MessageBird\Wire\Model\WhatsAppContactCard::class => false,
            \MessageBird\Wire\Model\WhatsAppContactCardName::class => false,
            \MessageBird\Wire\Model\WhatsAppContactCardOrg::class => false,
            \MessageBird\Wire\Model\WhatsAppError::class => false,
            \MessageBird\Wire\Model\WhatsAppMessage::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageFrom::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageTo::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageText::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageImage::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageVideo::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageAudio::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageSticker::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageDocument::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageLocation::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageUnsupported::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageList::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageSendRequest::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageSendRequestTemplate::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageSendRequestText::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageSendRequestImage::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageSendRequestVideo::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageSendRequestAudio::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageSendRequestSticker::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageSendRequestDocument::class => false,
            \MessageBird\Wire\Model\WhatsAppMessageSendRequestLocation::class => false,
            \MessageBird\Wire\Model\WhatsAppEvent::class => false,
            \MessageBird\Wire\Model\WhatsAppEventList::class => false,
            \MessageBird\Wire\Model\EmailStatsSeriesPeriod::class => false,
            \MessageBird\Wire\Model\EmailDeliveryStatsBounces::class => false,
            \MessageBird\Wire\Model\EmailLatencyQuantiles::class => false,
            \MessageBird\Wire\Model\EmailStatsPoint::class => false,
            \MessageBird\Wire\Model\EmailStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\EmailStatsPointEngagement::class => false,
            \MessageBird\Wire\Model\EmailStatsPointLatency::class => false,
            \MessageBird\Wire\Model\EmailStatsResponse::class => false,
            \MessageBird\Wire\Model\EmailStatsPeriod::class => false,
            \MessageBird\Wire\Model\EmailStatsSeriesPoint::class => false,
            \MessageBird\Wire\Model\EmailTagStatsPoint::class => false,
            \MessageBird\Wire\Model\EmailTagStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\EmailTagStatsPointEngagement::class => false,
            \MessageBird\Wire\Model\EmailTagStatsPointLatency::class => false,
            \MessageBird\Wire\Model\EmailStatsTagsResponse::class => false,
            \MessageBird\Wire\Model\EmailStatsSummaryPeriod::class => false,
            \MessageBird\Wire\Model\EmailStatsComparisonDelta::class => false,
            \MessageBird\Wire\Model\EmailStatsComparisonDelivery::class => false,
            \MessageBird\Wire\Model\EmailStatsComparisonEngagement::class => false,
            \MessageBird\Wire\Model\EmailStatsComparisonLatency::class => false,
            \MessageBird\Wire\Model\EmailStatsSummary::class => false,
            \MessageBird\Wire\Model\EmailStatsSummaryDelivery::class => false,
            \MessageBird\Wire\Model\EmailStatsSummaryEngagement::class => false,
            \MessageBird\Wire\Model\EmailStatsSummaryLatency::class => false,
            \MessageBird\Wire\Model\EmailStatsSummaryComparison::class => false,
            \MessageBird\Wire\Model\EmailSendingIpDeliveryStatsBounces::class => false,
            \MessageBird\Wire\Model\EmailSendingIpStatsPoint::class => false,
            \MessageBird\Wire\Model\EmailSendingIpStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\EmailSendingIpStatsPointLatency::class => false,
            \MessageBird\Wire\Model\EmailStatsBySendingIpResponse::class => false,
            \MessageBird\Wire\Model\EmailSendingDomainStatsPoint::class => false,
            \MessageBird\Wire\Model\EmailSendingDomainStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\EmailSendingDomainStatsPointEngagement::class => false,
            \MessageBird\Wire\Model\EmailSendingDomainStatsPointLatency::class => false,
            \MessageBird\Wire\Model\EmailStatsBySendingDomainResponse::class => false,
            \MessageBird\Wire\Model\EmailCategoryStatsPoint::class => false,
            \MessageBird\Wire\Model\EmailCategoryStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\EmailCategoryStatsPointEngagement::class => false,
            \MessageBird\Wire\Model\EmailCategoryStatsPointLatency::class => false,
            \MessageBird\Wire\Model\EmailStatsByCategoryResponse::class => false,
            \MessageBird\Wire\Model\EmailMailboxProviderDeliveryStatsBounces::class => false,
            \MessageBird\Wire\Model\EmailMailboxProviderStatsPoint::class => false,
            \MessageBird\Wire\Model\EmailMailboxProviderStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\EmailMailboxProviderStatsPointEngagement::class => false,
            \MessageBird\Wire\Model\EmailMailboxProviderStatsPointLatency::class => false,
            \MessageBird\Wire\Model\EmailStatsByMailboxProviderResponse::class => false,
            \MessageBird\Wire\Model\EmailMailboxProviderRegionStatsPoint::class => false,
            \MessageBird\Wire\Model\EmailMailboxProviderRegionStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\EmailMailboxProviderRegionStatsPointEngagement::class => false,
            \MessageBird\Wire\Model\EmailMailboxProviderRegionStatsPointLatency::class => false,
            \MessageBird\Wire\Model\EmailStatsByMailboxProviderRegionResponse::class => false,
            \MessageBird\Wire\Model\EmailRecipientDomainStatsPoint::class => false,
            \MessageBird\Wire\Model\EmailRecipientDomainStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\EmailRecipientDomainStatsPointEngagement::class => false,
            \MessageBird\Wire\Model\EmailRecipientDomainStatsPointLatency::class => false,
            \MessageBird\Wire\Model\EmailStatsByRecipientDomainResponse::class => false,
            \MessageBird\Wire\Model\EmailTemplateStatsPoint::class => false,
            \MessageBird\Wire\Model\EmailTemplateStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\EmailTemplateStatsPointEngagement::class => false,
            \MessageBird\Wire\Model\EmailTemplateStatsPointLatency::class => false,
            \MessageBird\Wire\Model\EmailStatsByTemplateResponse::class => false,
            \MessageBird\Wire\Model\EmailLocationStatsPoint::class => false,
            \MessageBird\Wire\Model\EmailLocationStatsPointEngagement::class => false,
            \MessageBird\Wire\Model\EmailStatsByLocationResponse::class => false,
            \MessageBird\Wire\Model\EmailClientStatsPoint::class => false,
            \MessageBird\Wire\Model\EmailClientStatsPointEngagement::class => false,
            \MessageBird\Wire\Model\EmailStatsByClientResponse::class => false,
            \MessageBird\Wire\Model\EmailBounceCodeStatsPoint::class => false,
            \MessageBird\Wire\Model\EmailBounceCodeStatsPointBounces::class => false,
            \MessageBird\Wire\Model\EmailStatsByBounceCodeResponse::class => false,
            \MessageBird\Wire\Model\EmailComplaintTypeStatsPoint::class => false,
            \MessageBird\Wire\Model\EmailStatsByComplaintTypeResponse::class => false,
            \MessageBird\Wire\Model\EmailBroadcastStatsPoint::class => false,
            \MessageBird\Wire\Model\EmailBroadcastStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\EmailBroadcastStatsPointEngagement::class => false,
            \MessageBird\Wire\Model\EmailBroadcastStatsPointLatency::class => false,
            \MessageBird\Wire\Model\EmailStatsByBroadcastResponse::class => false,
            \MessageBird\Wire\Model\DomainSettings::class => false,
            \MessageBird\Wire\Model\DomainDKIM::class => false,
            \MessageBird\Wire\Model\DomainCapabilityPending::class => false,
            \MessageBird\Wire\Model\DomainCapability::class => false,
            \MessageBird\Wire\Model\DomainCapabilities::class => false,
            \MessageBird\Wire\Model\DNSRecord::class => false,
            \MessageBird\Wire\Model\Domain::class => false,
            \MessageBird\Wire\Model\DomainList::class => false,
            \MessageBird\Wire\Model\DomainReturnPathConfig::class => false,
            \MessageBird\Wire\Model\DomainTrackingConfig::class => false,
            \MessageBird\Wire\Model\DomainDKIMConfig::class => false,
            \MessageBird\Wire\Model\DomainCreate::class => false,
            \MessageBird\Wire\Model\DomainInboundConfig::class => false,
            \MessageBird\Wire\Model\DomainUpdate::class => false,
            \MessageBird\Wire\Model\DomainUpdateTracking::class => false,
            \MessageBird\Wire\Model\DomainEvent::class => false,
            \MessageBird\Wire\Model\DomainEventList::class => false,
            \MessageBird\Wire\Model\ShareDomainDnsRequest::class => false,
            \MessageBird\Wire\Model\MailboxOwner::class => false,
            \MessageBird\Wire\Model\Mailbox::class => false,
            \MessageBird\Wire\Model\MailboxList::class => false,
            \MessageBird\Wire\Model\MailboxCreate::class => false,
            \MessageBird\Wire\Model\MailboxUpdate::class => false,
            \MessageBird\Wire\Model\MailboxStatsSummary::class => false,
            \MessageBird\Wire\Model\MailboxStatsSummaryDelivery::class => false,
            \MessageBird\Wire\Model\MailboxStatsSummaryEngagement::class => false,
            \MessageBird\Wire\Model\MailboxStatsSummaryLatency::class => false,
            \MessageBird\Wire\Model\MailboxStatsPoint::class => false,
            \MessageBird\Wire\Model\MailboxStatsPointDelivery::class => false,
            \MessageBird\Wire\Model\MailboxStatsPointEngagement::class => false,
            \MessageBird\Wire\Model\MailboxStatsPointLatency::class => false,
            \MessageBird\Wire\Model\MailboxStatsResponse::class => false,
            \MessageBird\Wire\Model\ReceiveRule::class => false,
            \MessageBird\Wire\Model\ReceiveRuleList::class => false,
            \MessageBird\Wire\Model\ReceiveRuleCreate::class => false,
            \MessageBird\Wire\Model\EmailThreadHighlights::class => false,
            \MessageBird\Wire\Model\EmailThread::class => false,
            \MessageBird\Wire\Model\EmailThreadList::class => false,
            \MessageBird\Wire\Model\EmailLabelsUpdate::class => false,
            \MessageBird\Wire\Model\EmailThreadUpdateRequest::class => false,
            \MessageBird\Wire\Model\EmailThreadMessageRecipient::class => false,
            \MessageBird\Wire\Model\EmailThreadMessageAttachment::class => false,
            \MessageBird\Wire\Model\EmailThreadMessageSource::class => false,
            \MessageBird\Wire\Model\EmailThreadMessage::class => false,
            \MessageBird\Wire\Model\EmailThreadMessageList::class => false,
            \MessageBird\Wire\Model\EmailThreadMessageUpdateRequest::class => false,
            \MessageBird\Wire\Model\EmailThreadMessageBody::class => false,
            \MessageBird\Wire\Model\EmailThreadMessageAttachmentList::class => false,
            \MessageBird\Wire\Model\EmailThreadMessageReplyRequest::class => false,
            \MessageBird\Wire\Model\EmailMailboxComposeRequest::class => false,
            \MessageBird\Wire\Model\EmailMailboxLabel::class => false,
            \MessageBird\Wire\Model\EmailMailboxLabelList::class => false,
            \MessageBird\Wire\Model\NumberOwnership::class => false,
            \MessageBird\Wire\Model\Number::class => false,
            \MessageBird\Wire\Model\NumberList::class => false,
            \MessageBird\Wire\Model\AvailableNumber::class => false,
            \MessageBird\Wire\Model\AvailableNumberList::class => false,
            \MessageBird\Wire\Model\NumbersOrder::class => false,
            \MessageBird\Wire\Model\NumbersOrderList::class => false,
            \MessageBird\Wire\Model\NumbersOrderCreate::class => false,
            \MessageBird\Wire\Model\VoiceMediaQuality::class => false,
            \MessageBird\Wire\Model\VoiceCallCost::class => false,
            \MessageBird\Wire\Model\VoiceCall::class => false,
            \MessageBird\Wire\Model\VoiceCallActor::class => false,
            \MessageBird\Wire\Model\VoiceCallList::class => false,
            \Jane\Component\JsonSchemaRuntime\Reference::class => false,
        ];
    }
}
