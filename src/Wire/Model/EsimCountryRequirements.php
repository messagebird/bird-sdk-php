<?php

namespace MessageBird\Wire\Model;

class EsimCountryRequirements
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
     * ISO 3166-1 alpha-2 country code.
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * Revision identifying the returned identification schema. A changed revision means the requirements or guidance changed. It does not indicate an expiry time or purchase authorization.
     *
     * @var string|null
     */
    protected $schemaRevision;
    /**
     * Complete JSON Schema draft 2020-12 document for customer-side identification validation. It declares $schema, type, title, description, properties, required, and additionalProperties. Property definitions use string or object types, standard format, pattern, minLength, maxLength, enum, and nested object keywords. Enable format assertions in your validator for email addresses and dates. Every country requires first_name, last_name, and email. Other customer-owned properties are allowed, so one details object can satisfy several countries. Bird does not receive or verify the values. Document references are opaque identifiers in customer-managed storage, not Bird upload IDs or required URLs.
     * 
     *
     * @var array<string, mixed>|null
     */
    protected $schema;
    /**
     * ISO 3166-1 alpha-2 country code.
     *
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * ISO 3166-1 alpha-2 country code.
     *
     * @param string|null $countryCode
     *
     * @return self
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;
        return $this;
    }
    /**
     * Revision identifying the returned identification schema. A changed revision means the requirements or guidance changed. It does not indicate an expiry time or purchase authorization.
     *
     * @return string|null
     */
    public function getSchemaRevision(): ?string
    {
        return $this->schemaRevision;
    }
    /**
     * Revision identifying the returned identification schema. A changed revision means the requirements or guidance changed. It does not indicate an expiry time or purchase authorization.
     *
     * @param string|null $schemaRevision
     *
     * @return self
     */
    public function setSchemaRevision(?string $schemaRevision): self
    {
        $this->initialized['schemaRevision'] = true;
        $this->schemaRevision = $schemaRevision;
        return $this;
    }
    /**
     * Complete JSON Schema draft 2020-12 document for customer-side identification validation. It declares $schema, type, title, description, properties, required, and additionalProperties. Property definitions use string or object types, standard format, pattern, minLength, maxLength, enum, and nested object keywords. Enable format assertions in your validator for email addresses and dates. Every country requires first_name, last_name, and email. Other customer-owned properties are allowed, so one details object can satisfy several countries. Bird does not receive or verify the values. Document references are opaque identifiers in customer-managed storage, not Bird upload IDs or required URLs.
     * 
     *
     * @return array<string, mixed>|null
     */
    public function getSchema(): ?iterable
    {
        return $this->schema;
    }
    /**
     * Complete JSON Schema draft 2020-12 document for customer-side identification validation. It declares $schema, type, title, description, properties, required, and additionalProperties. Property definitions use string or object types, standard format, pattern, minLength, maxLength, enum, and nested object keywords. Enable format assertions in your validator for email addresses and dates. Every country requires first_name, last_name, and email. Other customer-owned properties are allowed, so one details object can satisfy several countries. Bird does not receive or verify the values. Document references are opaque identifiers in customer-managed storage, not Bird upload IDs or required URLs.
     *
     * @param array<string, mixed>|null $schema
     *
     * @return self
     */
    public function setSchema(?iterable $schema): self
    {
        $this->initialized['schema'] = true;
        $this->schema = $schema;
        return $this;
    }
}
